<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianGagasanKreatif;

class DataGagasanKreatifController extends Controller
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

            if (!empty($mahasiswa_sarjanas[0])) {
                $prestasis = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 2)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();
            } else {
                $prestasis = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 2)->get();
            }

            if (!empty($prestasis[0])) {
                return view('dashboard.data-gagasan-kreatif.index', [
                    'title'     => 'Data Prestasi Gagasan Kreatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasis' => $prestasis
                ]);
            }

            return view('dashboard.data-gagasan-kreatif.index', [
                'title'     => 'Data Prestasi Gagasan Kreatif',
                'user'      => User::find(Auth::user()->id),
                'prestasis' => ''
            ]);
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
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function show($slug, PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        $prestasi = Prestasi::where('slug', $slug)->where('kriteria_id', 2)->get();

        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if ($tahun_seleksi[0]->id == $prestasi[0]->tahun_seleksi_id) {
            if (!empty($prestasi[0])) {
                return view('dashboard.data-gagasan-kreatif.show', [
                    'title'     => 'Data Prestasi Gagasan Kreatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasi'  => $prestasi[0]
                ]);
            }

            abort(404);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        //
    }
}
