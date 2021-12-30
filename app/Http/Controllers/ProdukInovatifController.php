<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Prestasi;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianProdukInovatif;
use Illuminate\Support\Facades\Storage;
use App\Models\PenilaianCapaianUnggulan;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukInovatifController extends Controller
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
            $prestasi = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 4)->get();

            if (!empty($prestasi[0]->judul)) {
                return view('dashboard.produk-inovatif.index', [
                    'title'     => 'Data Prestasi Produk Inovatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasi'  => $prestasi[0]
                ]);
            }

            return view('dashboard.produk-inovatif.index', [
                'title'     => 'Data Prestasi Produk Inovatif',
                'user'      => User::find(Auth::user()->id),
                'prestasi'  => ''
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
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        $kriteria = Kriteria::where('name', 'Produk Inovatif')->where('program_pendidikan', 'Diploma')->get();

        if (!empty($tahun_seleksi[0])) {
            return view('dashboard.produk-inovatif.create', [
                'title'     => 'Masukan Produk Inovatif',
                'user'      => User::find(Auth::user()->id),
                'seleksi'   => $tahun_seleksi[0],
                'kriteria'  => $kriteria[0]
            ]);
        }

        abort(404);
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
            'judul' => 'required|string|max:255',
            'file'  => 'required|mimes:pdf|file|max:2048'
        ]);

        $check_prestasi = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', $request->kriteria_id)->where('tahun_seleksi_id', $request->tahun_seleksi_id)->get();

        if (!empty($check_prestasi[0])) {
            if (!empty($check_prestasi[0]->judul)) {
                return redirect('/dashboard/prestasi/produk-inovatif')->with('error', 'Produk Inovatif baru gagal ditambahkan.');
            }

            $validatedData['file'] = $request->file('file')->store('produk-inovatif');

            Prestasi::where('id', $check_prestasi[0]->id)
                ->update([
                    'mahasiswa_id'      => Auth::user()->mahasiswa->id,
                    'kriteria_id'       => $request->kriteria_id,
                    'judul'             => $validatedData['judul'],
                    'slug'              => SlugService::createSlug(Prestasi::class, 'slug', $validatedData['judul']),
                    'file'              => $validatedData['file'],
                    'nilai'             => 0,
                    'tahun_seleksi_id'  => $request->tahun_seleksi_id
                ]);

            return redirect('/dashboard/prestasi/produk-inovatif')->with('success', 'Produk Inovatif baru berhasil ditambahkan.');
        }

        $validatedData['file'] = $request->file('file')->store('produk-inovatif');

        $kriteria_id = 3;

        Prestasi::create([
            'mahasiswa_id'      => Auth::user()->mahasiswa->id,
            'kriteria_id'       => $kriteria_id,
            'nilai'             => 0,
            'tahun_seleksi_id'  => $request->tahun_seleksi_id
        ]);

        Prestasi::create([
            'mahasiswa_id'      => Auth::user()->mahasiswa->id,
            'kriteria_id'       => $request->kriteria_id,
            'judul'             => $validatedData['judul'],
            'slug'              => SlugService::createSlug(Prestasi::class, 'slug', $validatedData['judul']),
            'file'              => $validatedData['file'],
            'nilai'             => 0,
            'tahun_seleksi_id'  => $request->tahun_seleksi_id
        ]);

        return redirect('/dashboard/prestasi/produk-inovatif')->with('success', 'Produk Inovatif baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestasi $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestasi $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, Prestasi $prestasi)
    {
        $prestasi = Prestasi::where('slug', $slug)->where('kriteria_id', 4)->get();
        if (!empty($prestasi[0])) {
            $tahun_seleksi = TahunSeleksi::where('id', $prestasi[0]->tahun_seleksi_id)->get();
            if ($prestasi[0]->mahasiswa_id == Auth::user()->mahasiswa->id) {
                return view('dashboard.produk-inovatif.edit', [
                    'title'     => 'Edit Prestasi Produk Inovatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasi'  => $prestasi[0],
                    'seleksi'   => $tahun_seleksi[0]
                ]);
            }

            abort(404);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestasi $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'file'  => 'mimes:pdf|file|max:2048'
        ]);

        if ($request->file('file')) {
            $prestasi = Prestasi::where('id', $request->id)->get();

            Storage::delete($prestasi[0]->file);

            $validatedData['file'] = $request->file('file')->store('produk-inovatif');

            Prestasi::where('id', $request->id)
                ->update([
                    'file' => $validatedData['file']
                ]);

            $check_nilai = Prestasi::where('id', $request->id)->get();

            if ($check_nilai->nilai != 0) {
                $check_ppis = PenilaianProdukInovatif::where('prestasi_id', $request->id)->get();

                if (!empty($check_ppis[0])) {
                    foreach ($check_ppis as $check_ppi) {
                        PenilaianProdukInovatif::destroy('id', $check_ppi->id);
                    }
                }

                Prestasi::where('id', $request->id)
                    ->update([
                        'nilai'  => 0
                    ]);
            }
        }

        Prestasi::where('id', $request->id)
            ->update([
                'judul' => $validatedData['judul'],
                'slug'  => SlugService::createSlug(Prestasi::class, 'slug', $validatedData['judul']),
            ]);

        return redirect('/dashboard/prestasi/produk-inovatif')->with('success', 'Prestasi produk inovatif berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestasi $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, Prestasi $prestasi)
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if ($tahun_seleksi[0]->tanggal_buka <= now() && $tahun_seleksi[0]->tanggal_tutup >= now()) {
            $prestasi = Prestasi::where('slug', $slug)->get();
            Storage::delete($prestasi[0]->file);

            if ($prestasi[0]->nilai != 0) {
                $penilaian_produk_inovatifs = PenilaianProdukInovatif::where('prestasi_id', $prestasi[0]->id)->get();

                foreach ($penilaian_produk_inovatifs as $penilaian_pi) {
                    PenilaianProdukInovatif::destroy('id', $penilaian_pi->id);
                }
            }

            Prestasi::where('id', $prestasi[0]->id)
                ->update([
                    'judul' => Null,
                    'slug'  => Null,
                    'file'  => Null,
                    'nilai' => 0
                ]);

            $check_pcu = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 3)->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->get();

            $count_pcu = count(PenilaianCapaianUnggulan::where('prestasi_id', $check_pcu[0]->id)->get());

            if ($count_pcu == 0) {
                $prestasis = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->get();

                foreach ($prestasis as $prestasi) {
                    Prestasi::destroy('id', $prestasi->id);
                }
            }

            return redirect('/dashboard/prestasi/produk-inovatif')->with('success', 'Data prestasi produk inovatif berhasil dihapus.');
        }

        return redirect('/dashboard/prestasi/produk-inovatif')->with('error', 'Pendaftaran ditutup, data tidak bisa dihapus.');
    }
}
