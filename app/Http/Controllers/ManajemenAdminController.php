<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\PenilaianGagasanKreatif;
use App\Models\PenilaianProdukInovatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class ManajemenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.manajemen-admin.index', [
            'title'     => 'Manajemen Administrator',
            'user'      => User::with('dosen')->find(Auth::user()->id),
            'admins'    => User::with('dosen')->where('role', 'admin')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manajemen-admin.create', [
            'title' => 'Tambah Administrator',
            'user'  => User::find(Auth::user()->id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role'      => 'required',
            'status'    => 'required',
            'image'     => 'image|file|max:1024',
            'name'      => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nip'       => 'required|alpha_num|min:18|max:19|unique:dosens',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:8|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'email'     => $validatedData['email'],
            'password'  => $validatedData['password'],
            'role'      => $validatedData['role'],
            'status'    => $validatedData['status']
        ]);

        event(new Registered($user));

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('dosen');

            User::where('email', $validatedData['email'])
                ->update([
                    'image' => $validatedData['image']
                ]);
        }

        [$user] = User::where('email', $validatedData['email'])->get();

        Dosen::create([
            'user_id'   => $user->id,
            'nip'       => $validatedData['nip'],
            'name'      => $validatedData['name']
        ]);

        return redirect('/dashboard/manajemen-admin')->with('success', 'Administrator baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show($nip, Dosen $dosen)
    {
        $check_admin = $dosen->with('user')->where('nip', $nip)->get();
        if (!empty($check_admin[0]) && $check_admin[0]->user->role == 'admin') {
            return view('dashboard.manajemen-admin.show', [
                'title' => 'Detail Administrator',
                'user'  => User::find(Auth::user()->id),
                'admin' => $check_admin[0]
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($nip, Dosen $dosen)
    {
        $check_admin = $dosen->with('user')->where('nip', $nip)->get();
        if (!empty($check_admin[0]) && $check_admin[0]->user->role == 'admin') {
            return view('dashboard.manajemen-admin.edit', [
                'title' => 'Edit Administrator',
                'user'  => User::find(Auth::user()->id),
                'admin' => $check_admin[0]
            ]);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        [$check_admin] = $dosen->with('user')->where('id', $request->id)->get();

        $rulesUser = [
            'email'     => '',
            'image'     => 'image|file|max:1024',
            'role'      => 'required',
            'status'    => 'required',
            'password'  => ''
        ];

        $rulesDosen = [
            'name'  => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nip'   => ''
        ];

        if ($check_admin->nip != $request->nip) {
            $rulesDosen['nip'] = 'required|alpha_num|min:18|max:19|unique:dosens';
        }

        if ($request->email != $check_admin->user->email) {
            $rulesUser['email'] = 'required|email:dns|unique:users';
        }

        if ($request->password) {
            $rulesUser['password'] = 'required|min:8|confirmed';
        }

        $validatedDataUser = $request->validate($rulesUser);

        $validatedDataDosen = $request->validate($rulesDosen);

        if ($request->password) {
            $validatedDataUser['password'] = Hash::make($request->password);
        } else {
            $validatedDataUser['password'] = $check_admin->user->password;
        }

        if ($request->file('image')) {
            if ($check_admin->user->image) {
                Storage::delete($check_admin->user->image);
            }
            $validatedDataUser['image'] = $request->file('image')->store('dosen');
        }

        $total_admin = User::where('role', 'admin')->get();

        if (count($total_admin) <= 1) {
            if ($request->role != 'admin' || $request->status != 'aktif') {
                return redirect('/dashboard/manajemen-admin')->with('error', 'Data administrator gagal diperbaharui.');
            }
        }

        User::where('id', $check_admin->user_id)
            ->update($validatedDataUser);

        Dosen::where('id', $check_admin->id)
            ->update($validatedDataDosen);

        if ($request->email != $check_admin->user->email) {
            User::where('id', $check_admin->user_id)
                ->update([
                    'email_verified_at' => null
                ]);

            $user = User::where('id', $check_admin->user_id)->get();

            $user[0]->sendEmailVerificationNotification();
        }

        return redirect('/dashboard/manajemen-admin')->with('success', 'Data administrator berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip, Dosen $dosen)
    {
        $total_admin = User::where('role', 'admin')->get();

        if (count($total_admin) <= 1) {
            return redirect('/dashboard/manajemen-admin')->with('error', 'Administrator gagal dihapus.');
        }

        [$check_admin] = $dosen->with('user')->where('nip', $nip)->get();

        if ($check_admin->user->image) {
            Storage::delete($check_admin->user->image);
        }

        $check_pgks = PenilaianGagasanKreatif::where('dosen_id', $check_admin->id)->get();

        if (!empty($check_pgks[0])) {
            foreach ($check_pgks as $check_pgk) {
                PenilaianGagasanKreatif::destroy('id', $check_pgk->id);
            }
        }

        $check_ppis = PenilaianProdukInovatif::where('dosen_id', $check_admin->id)->get();

        if (!empty($check_ppis[0])) {
            foreach ($check_ppis as $check_ppi) {
                PenilaianProdukInovatif::destroy('id', $check_ppi->id);
            }
        }

        Dosen::destroy('id', $check_admin->id);

        User::destroy('id', $check_admin->user_id);

        return redirect('/dashboard/manajemen-admin')->with('success', 'Administrator berhasil dihapus.');
    }
}
