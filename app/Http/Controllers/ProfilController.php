<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianGagasanKreatif;
use App\Models\PenilaianProdukInovatif;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($nomor_induk, User $user)
    {
        if (Auth::user()->role == 'admin' or Auth::user()->role == 'dosen' or Auth::user()->role == 'juri') {
            if ($nomor_induk == Auth::user()->dosen->nip) {
                return view('dashboard.profil.dosen', [
                    'title' => 'Profil',
                    'user'  => $user->find(Auth::user()->id)
                ]);
            }

            abort(404);
        } else if (Auth::user()->role == 'mahasiswa') {
            if ($nomor_induk == Auth::user()->mahasiswa->npm) {
                return view('dashboard.profil.mahasiswa', [
                    'title' => 'Profil',
                    'user'  => $user->find(Auth::user()->id)
                ]);
            }

            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($nomor_induk, User $user)
    {
        if (Auth::user()->role == 'admin' or Auth::user()->role == 'dosen' or Auth::user()->role == 'juri') {
            if ($nomor_induk == Auth::user()->dosen->nip) {
                return view('dashboard.profil.edit-dosen', [
                    'title' => 'Edit Profil',
                    'user'  => $user->find(Auth::user()->id)
                ]);
            }

            abort(404);
        } else if (Auth::user()->role == 'mahasiswa') {
            if ($nomor_induk == Auth::user()->mahasiswa->npm) {
                return view('dashboard.profil.edit-mahasiswa', [
                    'title' => 'Edit Profil',
                    'user'  => $user->find(Auth::user()->id)
                ]);
            }

            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role == 'admin' or Auth::user()->role == 'dosen' or Auth::user()->role == 'juri') {
            $rulesUser = [
                'email' => '',
                'image' => 'image|file|max:1024'
            ];

            $rulesDosen = [
                'name' => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
                'nip'  => ''
            ];

            if ($request->nip != Auth::user()->dosen->nip) {
                $rulesDosen['nip'] = 'required|alpha_num|min:18|max:19|unique:dosens';
            }

            if ($request->email != Auth::user()->email) {
                $rulesUser['email'] = 'required|email:dns|unique:users';
            }

            $validatedDataUser = $request->validate($rulesUser);

            $validatedDataDosen = $request->validate($rulesDosen);

            if ($request->file('image')) {
                if (Auth::user()->image) {
                    Storage::delete(Auth::user()->image);
                }
                $validatedDataUser['image'] = $request->file('image')->store('dosen');
            }

            User::where('id', Auth::user()->id)
                ->update($validatedDataUser);

            Dosen::where('user_id', Auth::user()->id)
                ->update($validatedDataDosen);

            if ($request->email != Auth::user()->email) {
                User::where('id', Auth::user()->id)
                    ->update([
                        'email_verified_at' => null
                    ]);

                $request->user()->fresh()->sendEmailVerificationNotification();
            }

            return redirect('/profil/' . $validatedDataDosen['nip'])->with('success', 'Profil berhasil diperbaharui.');
        } else if (Auth::user()->role == 'mahasiswa') {
            $rulesUser = [
                'email' => '',
                'image' => 'image|file|max:1024'
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

            if ($request->nik != Auth::user()->mahasiswa->nik) {
                $rulesMahasiswa['nik'] = 'required|numeric|digits:16|unique:mahasiswas';
            }

            if ($request->npm != Auth::user()->mahasiswa->npm) {
                $rulesMahasiswa['npm'] = 'required|numeric|digits:10|unique:mahasiswas';
            }

            if ($request->email != Auth::user()->email) {
                $rulesUser['email'] = 'required|email:dns|unique:users';
            }

            if ($request->telp != Auth::user()->mahasiswa->telp) {
                $rulesMahasiswa['telp'] = 'required|numeric|digits_between:9,14|unique:mahasiswas';
            }

            if ($request->program_studi) {
                $rulesMahasiswa['program_studi'] = 'required';
            }

            $validatedDataUser = $request->validate($rulesUser);

            $validatedDataMahasiswa = $request->validate($rulesMahasiswa);

            if ($request->file('image')) {
                if (Auth::user()->image) {
                    Storage::delete(Auth::user()->image);
                }
                $validatedDataUser['image'] = $request->file('image')->store('mahasiswa');
            }

            if ($request->program_pendidikan == 'Sarjana' && Auth::user()->mahasiswa->program_pendidikan == 'Diploma') {
                $check_prestasi = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();

                if (!empty($check_prestasi[0])) {
                    $check_cus = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 3)->get();

                    if (!empty($check_cus[0])) {
                        foreach ($check_cus as $check_cu) {
                            Prestasi::where('id', $check_cu->id)
                                ->update([
                                    'kriteria_id' => 1
                                ]);
                        }
                    }

                    $check_pis = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 4)->get();

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

            if ($request->program_pendidikan == 'Diploma' && Auth::user()->mahasiswa->program_pendidikan == 'Sarjana') {
                $check_prestasi = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();

                if (!empty($check_prestasi[0])) {
                    $check_cus = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 1)->get();

                    if (!empty($check_cus[0])) {
                        foreach ($check_cus as $check_cu) {
                            Prestasi::where('id', $check_cu->id)
                                ->update([
                                    'kriteria_id' => 3
                                ]);
                        }
                    }

                    $check_gks = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 2)->get();

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

            User::where('id', Auth::user()->id)
                ->update($validatedDataUser);

            Mahasiswa::where('user_id', Auth::user()->id)
                ->update($validatedDataMahasiswa);

            if ($request->email != Auth::user()->email) {
                User::where('id', Auth::user()->id)
                    ->update([
                        'email_verified_at' => null
                    ]);

                $user = User::where('id', Auth::user()->id)->get();

                $user[0]->sendEmailVerificationNotification();
            }

            return redirect('/profil/' . $validatedDataMahasiswa['npm'])->with('success', 'Profil berhasil diperbaharui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
