<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianProdukInovatif;

class DataProdukInovatifController extends Controller
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

            $diplomas = Mahasiswa::where('program_pendidikan', 'Diploma')->whereIn('user_id', Arr::pluck($mahasiswa_aktifs, 'id'))->get();

            if (!empty($diplomas[0])) {
                $prestasis = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 4)->whereIn('mahasiswa_id', Arr::pluck($diplomas, 'id'))->get();
            } else {
                $prestasis = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 4)->get();
            }

            if (!empty($prestasis[0])) {
                return view('dashboard.data-produk-inovatif.index', [
                    'title'     => 'Data Prestasi Produk Inovatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasis' => $prestasis
                ]);
            }

            return view('dashboard.data-produk-inovatif.index', [
                'title'     => 'Data Prestasi Produk Inovatif',
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
     * @param  \App\Models\PenilaianProdukInovatif  $penilaian_produk_inovatif
     * @return \Illuminate\Http\Response
     */
    public function show($slug, PenilaianProdukInovatif $penilaian_produk_inovatif)
    {
        $prestasi = Prestasi::where('slug', $slug)->where('kriteria_id', 4)->get();

        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if ($tahun_seleksi[0]->id == $prestasi[0]->tahun_seleksi_id) {
            if (!empty($prestasi[0])) {
                return view('dashboard.data-produk-inovatif.show', [
                    'title'     => 'Data Prestasi Produk Inovatif',
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
     * @param  \App\Models\PenilaianProdukInovatif  $penilaian_produk_inovatif
     * @return \Illuminate\Http\Response
     */
    public function edit(PenilaianProdukInovatif $penilaian_produk_inovatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenilaianProdukInovatif  $penilaian_produk_inovatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianProdukInovatif $penilaian_produk_inovatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianProdukInovatif  $penilaian_produk_inovatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenilaianProdukInovatif $penilaian_produk_inovatif)
    {
        //
    }
}
