<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\PenilaianGagasanKreatif;
use App\Models\PenilaianProdukInovatif;
use Illuminate\Support\Facades\Storage;
use App\Models\PenilaianCapaianUnggulan;

class ManajemenMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.manajemen-mahasiswa.index', [
            'title'         => 'Manajemen Mahasiswa',
            'user'          => User::with('dosen')->find(Auth::user()->id),
            'mahasiswas'    => User::with('mahasiswa')->where('role', 'mahasiswa')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manajemen-mahasiswa.create', [
            'title' => 'Tambah Mahasiswa',
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
            'status'                => 'required',
            'role'                  => 'required',
            'image'                 => 'image|file|max:1024',
            'name'                  => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nik'                   => 'required|numeric|digits:16|unique:mahasiswas',
            'tempat_lahir'          => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'tanggal_lahir'         => 'required|date',
            'npm'                   => 'required|numeric|digits:10|unique:mahasiswas',
            'telp'                  => 'required|numeric|digits_between:9,14|unique:mahasiswas',
            'program_pendidikan'    => 'required',
            'program_studi'         => 'required',
            'semester'              => 'required',
            'ipk'                   => 'required|numeric|between:0,4',
            'email'                 => 'required|email:dns|unique:users',
            'password'              => 'required|min:8|confirmed'
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
            $validatedData['image'] = $request->file('image')->store('mahasiswa');

            User::where('email', $validatedData['email'])
                ->update([
                    'image' => $validatedData['image']
                ]);
        }

        [$user] = User::where('email', $validatedData['email'])->get();

        Mahasiswa::create([
            'user_id'               => $user->id,
            'name'                  => $validatedData['name'],
            'nik'                   => $validatedData['nik'],
            'tempat_lahir'          => $validatedData['tempat_lahir'],
            'tanggal_lahir'         => $validatedData['tanggal_lahir'],
            'npm'                   => $validatedData['npm'],
            'telp'                  => $validatedData['telp'],
            'program_pendidikan'    => $validatedData['program_pendidikan'],
            'program_studi'         => $validatedData['program_studi'],
            'semester'              => $validatedData['semester'],
            'ipk'                   => $validatedData['ipk']
        ]);

        return redirect('/dashboard/manajemen-mahasiswa')->with('success', 'Mahasiswa baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($npm, Mahasiswa $mahasiswa)
    {
        $check_mahasiswa = $mahasiswa->with('user')->where('npm', $npm)->get();
        if (!empty($check_mahasiswa[0])) {
            return view('dashboard.manajemen-mahasiswa.show', [
                'title'     => 'Detail Mahasiswa',
                'user'      => User::find(Auth::user()->id),
                'mahasiswa' => $check_mahasiswa[0]
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($npm, Mahasiswa $mahasiswa)
    {
        $check_mahasiswa = $mahasiswa->with('user')->where('npm', $npm)->get();
        if (!empty($check_mahasiswa[0])) {
            return view('dashboard.manajemen-mahasiswa.edit', [
                'title'     => 'Edit Mahasiswa',
                'user'      => User::find(Auth::user()->id),
                'mahasiswa' => $check_mahasiswa[0]
            ]);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        [$check_mahasiswa] = $mahasiswa->with('user')->where('id', $request->id)->get();
        $rulesUser = [
            'image'     => 'image|file|max:1024',
            'email'     => '',
            'status'    => 'required',
            'password'  => ''
        ];

        $rulesMahasiswa = [
            'name'                  => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nik'                   => '',
            'tempat_lahir'          => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'tanggal_lahir'         => 'required|date',
            'npm'                   => '',
            'telp'                  => '',
            'program_pendidikan'    => 'required',
            'program_studi'         => '',
            'semester'              => 'required',
            'ipk'                   => 'required|numeric|between:0,4',
        ];

        if ($check_mahasiswa->nik != $request->nik) {
            $rulesMahasiswa['nik'] = 'required|numeric|digits:16|unique:mahasiswas';
        }

        if ($check_mahasiswa->npm != $request->npm) {
            $rulesMahasiswa['npm'] = 'required|numeric|digits:10|unique:mahasiswas';
        }

        if ($check_mahasiswa->telp != $request->telp) {
            $rulesMahasiswa['telp'] = 'required|numeric|digits_between:9,14|unique:mahasiswas';
        }

        if ($request->program_studi) {
            $rulesMahasiswa['program_studi'] = 'required';
        }

        if ($request->email != $check_mahasiswa->user->email) {
            $rulesUser['email'] = 'required|email:dns|unique:users';
        }

        if ($request->password) {
            $rulesUser['password'] = 'required|min:8|confirmed';
        }

        $validatedDataUser = $request->validate($rulesUser);

        $validatedDataDosen = $request->validate($rulesMahasiswa);

        if ($request->password) {
            $validatedDataUser['password'] = Hash::make($request->password);
        } else {
            $validatedDataUser['password'] = $check_mahasiswa->user->password;
        }

        if ($request->file('image')) {
            if ($check_mahasiswa->user->image) {
                Storage::delete($check_mahasiswa->user->image);
            }

            $validatedDataUser['image'] = $request->file('image')->store('mahasiswa');
        }

        User::where('id', $check_mahasiswa->user_id)
            ->update($validatedDataUser);

        Mahasiswa::where('id', $check_mahasiswa->id)
            ->update($validatedDataDosen);

        if ($request->email != $check_mahasiswa->user->email) {
            User::where('id', $check_mahasiswa->user_id)
                ->update([
                    'email_verified_at' => null
                ]);

            $user = User::where('id', $check_mahasiswa->user_id)->get();

            $user[0]->sendEmailVerificationNotification();
        }

        if ($request->program_pendidikan == 'Sarjana' && $check_mahasiswa->program_pendidikan == 'Diploma') {
            $check_prestasi = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->get();

            if (!empty($check_prestasi[0])) {
                $check_cus = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 3)->get();

                if (!empty($check_cus[0])) {
                    foreach ($check_cus as $check_cu) {
                        Prestasi::where('id', $check_cu->id)
                            ->update([
                                'kriteria_id' => 1
                            ]);
                    }
                }

                $check_pis = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 4)->get();

                if (!empty($check_pis[0])) {
                    foreach ($check_pis as $check_pi) {
                        if (!empty($check_pi->judul)) {
                            Storage::delete($check_pi->file);
                        }

                        $check_ppis = PenilaianProdukInovatif::where('prestasi_id', $check_pi->id)->get();

                        if (!empty($check_ppis[0])) {
                            foreach ($check_ppis as $check_ppi) {
                                PenilaianProdukInovatif::destroy('id', $check_ppi->id);
                            }
                        }

                        Prestasi::where('id', $check_pi->id)
                            ->update([
                                'kriteria_id'   => 2,
                                'judul'         => Null,
                                'slug'          => Null,
                                'file'          => Null,
                                'nilai'         => 0
                            ]);
                    }
                }
            }
        }

        if ($request->program_pendidikan == 'Diploma' && $check_mahasiswa->program_pendidikan == 'Sarjana') {
            $check_prestasi = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->get();

            if (!empty($check_prestasi[0])) {
                $check_cus = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 1)->get();

                if (!empty($check_cus[0])) {
                    foreach ($check_cus as $check_cu) {
                        Prestasi::where('id', $check_cu->id)
                            ->update([
                                'kriteria_id' => 3
                            ]);
                    }
                }

                $check_gks = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 2)->get();

                if (!empty($check_gks[0])) {
                    foreach ($check_gks as $check_gk) {
                        if (!empty($check_gk->judul)) {
                            Storage::delete($check_gk->file);
                        }

                        $check_pgks = PenilaianGagasanKreatif::where('prestasi_id', $check_gk->id)->get();

                        if (!empty($check_pgks[0])) {
                            foreach ($check_pgks as $check_pgk) {
                                PenilaianGagasanKreatif::destroy('id', $check_pgk->id);
                            }
                        }

                        Prestasi::where('id', $check_gk->id)
                            ->update([
                                'kriteria_id'   => 4,
                                'judul'         => Null,
                                'slug'          => Null,
                                'file'          => Null,
                                'nilai'         => 0
                            ]);
                    }
                }
            }
        }

        return redirect('/dashboard/manajemen-mahasiswa')->with('success', 'Data mahasiswa berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($npm, Mahasiswa $mahasiswa)
    {
        [$check_mahasiswa] = $mahasiswa->with('user')->where('npm', $npm)->get();

        if ($check_mahasiswa->user->image) {
            Storage::delete($check_mahasiswa->user->image);
        }

        if ($check_mahasiswa->program_pendidikan == 'Sarjana') {
            $check_prestasi = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->get();

            if (!empty($check_prestasi[0])) {
                $check_cus = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 1)->get();

                if (!empty($check_cus[0])) {
                    foreach ($check_cus as $check_cu) {
                        $check_pcus = PenilaianCapaianUnggulan::where('prestasi_id', $check_cu->id)->get();

                        if (!empty($check_pcus[0])) {
                            foreach ($check_pcus as $check_pcu) {
                                Storage::delete($check_pcu->image);

                                PenilaianCapaianUnggulan::destroy('id', $check_pcu->id);
                            }
                        }

                        Prestasi::destroy('id', $check_cu->id);
                    }
                }

                $check_gks = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 2)->get();

                if (!empty($check_gks[0])) {
                    foreach ($check_gks as $check_gk) {
                        if (!empty($check_gk->judul)) {
                            Storage::delete($check_gk->file);
                        }

                        $check_pgks = PenilaianGagasanKreatif::where('prestasi_id', $check_gk->id)->get();

                        if (!empty($check_pgks[0])) {
                            foreach ($check_pgks as $check_pgk) {
                                PenilaianGagasanKreatif::destroy('id', $check_pgk->id);
                            }
                        }

                        Prestasi::destroy('id', $check_gk->id);
                    }
                }
            }
        } elseif ($check_mahasiswa->program_pendidikan == 'Diploma') {
            $check_prestasi = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->get();

            if (!empty($check_prestasi[0])) {
                $check_cus = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 3)->get();

                if (!empty($check_cus[0])) {
                    foreach ($check_cus as $check_cu) {
                        $check_pcus = PenilaianCapaianUnggulan::where('prestasi_id', $check_cu->id)->get();

                        if (!empty($check_pcus[0])) {
                            foreach ($check_pcus as $check_pcu) {
                                Storage::delete($check_pcu->image);

                                PenilaianCapaianUnggulan::destroy('id', $check_pcu->id);
                            }
                        }

                        Prestasi::destroy('id', $check_cu->id);
                    }
                }

                $check_pis = Prestasi::where('mahasiswa_id', $check_mahasiswa->id)->where('kriteria_id', 4)->get();

                if (!empty($check_pis[0])) {
                    foreach ($check_pis as $check_pi) {
                        if (!empty($check_pi->judul)) {
                            Storage::delete($check_pi->file);
                        }

                        $check_ppis = PenilaianProdukInovatif::where('prestasi_id', $check_pi->id)->get();

                        if (!empty($check_ppis[0])) {
                            foreach ($check_ppis as $check_ppi) {
                                PenilaianProdukInovatif::destroy('id', $check_ppi->id);
                            }
                        }

                        Prestasi::destroy('id', $check_pi->id);
                    }
                }
            }
        }

        $check_hasils = Hasil::where('mahasiswa_id', $check_mahasiswa->id)->get();

        if (!empty($check_hasils[0])) {
            foreach ($check_hasils as $check_hasil) {
                Hasil::destroy('id', $check_hasil->id);
            }
        }

        Mahasiswa::destroy('id', $check_mahasiswa->id);

        User::destroy('id', $check_mahasiswa->user_id);

        return redirect('/dashboard/manajemen-mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
