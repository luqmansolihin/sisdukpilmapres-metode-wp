<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianCapaianUnggulan;

class PenilaianCapaianUnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if (!empty($tahun_seleksi[0])) {
            $mahasiswa_aktifs = User::where('role', 'mahasiswa')->where('status', 'aktif')->get();

            $mahasiswa_sarjanas = Mahasiswa::where('program_pendidikan', 'Sarjana')->whereIn('user_id', Arr::pluck($mahasiswa_aktifs, 'id'))->get();

            $mahasiswa_diplomas = Mahasiswa::where('program_pendidikan', 'Diploma')->whereIn('user_id', Arr::pluck($mahasiswa_aktifs, 'id'))->get();

            if (!empty($mahasiswa_sarjanas[0])) {
                $prestasi_sarjanas = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 1)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();
            } else {
                $prestasi_sarjanas = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 1)->get();
            }

            if (!empty($mahasiswa_diplomas[0])) {
                $prestasi_diplomas = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 3)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();
            } else {
                $prestasi_diplomas = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 3)->get();
            }

            if (!empty($prestasi_sarjanas[0]) && !empty($prestasi_diplomas[0])) {
                return view('dashboard.penilaian-capaian-unggulan.index', [
                    'title'             => 'Penilaian Prestasi Capaian Unggulan',
                    'user'              => User::find(Auth::user()->id),
                    'prestasi_sarjanas' => $prestasi_sarjanas,
                    'prestasi_diplomas' => $prestasi_diplomas
                ]);
            } elseif (!empty($prestasi_sarjanas[0]) && empty($prestasi_diplomas[0])) {
                return view('dashboard.penilaian-capaian-unggulan.index', [
                    'title'             => 'Penilaian Prestasi Capaian Unggulan',
                    'user'              => User::find(Auth::user()->id),
                    'prestasi_sarjanas' => $prestasi_sarjanas,
                    'prestasi_diplomas' => ''
                ]);
            } elseif (empty($prestasi_sarjanas[0]) && !empty($prestasi_diplomas[0])) {
                return view('dashboard.penilaian-capaian-unggulan.index', [
                    'title'             => 'Penilaian Prestasi Capaian Unggulan',
                    'user'              => User::find(Auth::user()->id),
                    'prestasi_sarjanas' => '',
                    'prestasi_diplomas' => $prestasi_diplomas
                ]);
            } else {
                return view('dashboard.penilaian-capaian-unggulan.index', [
                    'title'             => 'Penilaian Prestasi Capaian Unggulan',
                    'user'              => User::find(Auth::user()->id),
                    'prestasi_sarjanas' => '',
                    'prestasi_diplomas' => ''
                ]);
            }
        }

        abort(404);
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
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function show($npm, PenilaianCapaianUnggulan $penilaian_capaian_unggulan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function edit($npm, PenilaianCapaianUnggulan $penilaian_capaian_unggulan)
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if (!empty($tahun_seleksi[0])) {
            $mahasiswa = Mahasiswa::where('npm', $npm)->get();

            if (!empty($mahasiswa[0])) {
                if ($mahasiswa[0]->program_pendidikan == 'Sarjana') {
                    $prestasi = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', $mahasiswa[0]->id)->where('kriteria_id', 1)->get();
                } else {
                    $prestasi = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', $mahasiswa[0]->id)->where('kriteria_id', 3)->get();
                }

                if (!empty($prestasi[0])) {
                    $penilaian_capaian_unggulans = PenilaianCapaianUnggulan::with(['capaian_unggulan'])->where('prestasi_id', $prestasi[0]->id)->get();

                    return view('dashboard.penilaian-capaian-unggulan.edit', [
                        'title'                         => 'Penilaian Prestasi Capaian Unggulan',
                        'user'                          => User::find(Auth::user()->id),
                        'penilaian_capaian_unggulans'   => $penilaian_capaian_unggulans
                    ]);
                }

                abort(404);
            }

            abort(404);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianCapaianUnggulan $penilaian_capaian_unggulan)
    {
        $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('id', $request->id)->get();

        $prestasi = Prestasi::where('id', $request->prestasi_id)->get();

        if ($request->status == "Belum Terverifikasi") {
            if ($request->new_status == "Valid") {
                PenilaianCapaianUnggulan::where('id', $request->id)
                    ->update([
                        'status' => $request->new_status
                    ]);

                $new_nilai = $prestasi[0]->nilai + $request->skor;

                Prestasi::where('id', $request->prestasi_id)
                    ->update([
                        'nilai' => $new_nilai
                    ]);

                return back()->with('success', $penilaian_capaian_unggulan[0]->name . ' Valid');
            } elseif ($request->new_status == "Tidak Valid") {
                PenilaianCapaianUnggulan::where('id', $request->id)
                    ->update([
                        'status' => $request->new_status
                    ]);

                $new_nilai = $prestasi[0]->nilai + $request->skor;

                Prestasi::where('id', $request->prestasi_id)
                    ->update([
                        'nilai' => $new_nilai
                    ]);

                return back()->with('danger', $penilaian_capaian_unggulan[0]->name . ' Tidak Valid');
            }
        } elseif ($request->status == "Valid") {
            PenilaianCapaianUnggulan::where('id', $request->id)
                ->update([
                    'status' => $request->new_status
                ]);

            $new_nilai = $prestasi[0]->nilai - $request->skor;

            Prestasi::where('id', $request->prestasi_id)
                ->update([
                    'nilai' => $new_nilai
                ]);

            return back()->with('danger', $penilaian_capaian_unggulan[0]->name . ' Tidak Valid');
        } elseif ($request->status == "Tidak Valid") {
            PenilaianCapaianUnggulan::where('id', $request->id)
                ->update([
                    'status' => $request->new_status
                ]);

            $new_nilai = $prestasi[0]->nilai + $request->skor;

            Prestasi::where('id', $request->prestasi_id)
                ->update([
                    'nilai' => $new_nilai
                ]);

            return back()->with('success', $penilaian_capaian_unggulan[0]->name . ' Valid');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianCapaianUnggulan $penilaian_capaian_unggulan)
    {
        //
    }
}
