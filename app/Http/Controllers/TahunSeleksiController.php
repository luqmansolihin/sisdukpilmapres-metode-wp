<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Prestasi;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\PenilaianCapaianUnggulan;
use App\Models\PenilaianGagasanKreatif;
use App\Models\PenilaianProdukInovatif;
use Illuminate\Validation\ValidationException;

class TahunSeleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tahun-seleksi.index', [
            'title'             => 'Pelaksanaan Seleksi',
            'user'              => User::with('dosen')->find(Auth::user()->id),
            'tahun_seleksis'    => TahunSeleksi::orderBy('tahun_akademik', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tahun-seleksi.create', [
            'title' => 'Tambah Pelaksanaan Seleksi',
            'user'  => User::with('dosen')->find(Auth::user()->id),
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
            'tahun_akademik'        => 'required|unique:tahun_seleksis',
            'tanggal_buka'          => 'required|date_format:Y-m-d H:i:s',
            'tanggal_tutup'         => 'required|date_format:Y-m-d H:i:s',
            'tema_gagasan_kreatif'  => 'required|string|max:255',
            'tema_produk_inovatif'  => 'required|string|max:255'
        ]);

        if ($request->tanggal_buka < now()) {
            throw ValidationException::withMessages([
                'tanggal_buka' => 'tanggal buka cannot be earlier than now'
            ]);
        }

        if ($request->tanggal_tutup <= $request->tanggal_buka) {
            throw ValidationException::withMessages([
                'tanggal_tutup' => 'tanggal tutup cannot be earlier than tanggal buka'
            ]);
        }

        TahunSeleksi::create($validatedData);

        return redirect('/dashboard/tahun-seleksi')->with('success', 'Pelaksanaan seleksi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TahunSeleksi  $tahunSeleksi
     * @return \Illuminate\Http\Response
     */
    public function show(TahunSeleksi $tahunSeleksi)
    {
        return view('dashboard.tahun-seleksi.show', [
            'title'         => 'Detail Pelaksanaan Seleksi',
            'user'          => User::with('dosen')->find(Auth::user()->id),
            'tahun_seleksi' => $tahunSeleksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TahunSeleksi  $tahunSeleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunSeleksi $tahunSeleksi)
    {
        return view('dashboard.tahun-seleksi.edit', [
            'title'         => 'Edit Pelaksanaan Seleksi',
            'user'          => User::with('dosen')->find(Auth::user()->id),
            'tahun_seleksi' => $tahunSeleksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TahunSeleksi  $tahunSeleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunSeleksi $tahunSeleksi)
    {
        $ruleTahunSeleksi = [
            'tahun_akademik'        => '',
            'tanggal_buka'          => 'required|date_format:Y-m-d H:i:s',
            'tanggal_tutup'         => 'required|date_format:Y-m-d H:i:s',
            'tema_gagasan_kreatif'  => 'required|string|max:255',
            'tema_produk_inovatif'  => 'required|string|max:255'
        ];

        if ($request->tahun_akademik != $tahunSeleksi->tahun_akademik) {
            $ruleTahunSeleksi['tahun_akademik'] = 'required|unique:tahun_seleksis';
        }

        if ($request->tanggal_tutup <= $request->tanggal_buka) {
            throw ValidationException::withMessages([
                'tanggal_tutup' => 'tanggal tutup cannot be earlier than tanggal buka'
            ]);
        }

        if ($request->tanggal_buka != $tahunSeleksi->tanggal_buka) {
            if ($request->tanggal_buka < now()) {
                throw ValidationException::withMessages([
                    'tanggal_buka' => 'tanggal buka cannot be earlier than now'
                ]);
            }
        }

        $validatedData = $request->validate($ruleTahunSeleksi);

        $tahunSeleksi->where('id', $request->id)
            ->update($validatedData);

        return redirect('/dashboard/tahun-seleksi')->with('success', 'Pelaksanaan seleksi berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TahunSeleksi  $tahunSeleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahunSeleksi $tahunSeleksi)
    {
        $check_hasils = Hasil::where('tahun_seleksi_id', $tahunSeleksi->id)->get();

        if (!empty($check_hasils[0])) {
            foreach ($check_hasils as $check_hasil) {
                Hasil::destroy('id', $check_hasil->id);
            }
        }

        $check_cus = Prestasi::where('tahun_seleksi_id', $tahunSeleksi->id)->where('kriteria_id', 1)->get();

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

        $check_cuds = Prestasi::where('tahun_seleksi_id', $tahunSeleksi->id)->where('kriteria_id', 3)->get();

        if (!empty($check_cuds[0])) {
            foreach ($check_cuds as $check_cud) {
                $check_pcuds = PenilaianCapaianUnggulan::where('prestasi_id', $check_cud->id)->get();

                if (!empty($check_pcuds[0])) {
                    foreach ($check_pcuds as $check_pcud) {
                        Storage::delete($check_pcud->image);

                        PenilaianCapaianUnggulan::destroy('id', $check_pcud->id);
                    }
                }

                Prestasi::destroy('id', $check_cud->id);
            }
        }

        $check_gks = Prestasi::where('tahun_seleksi_id', $tahunSeleksi->id)->where('kriteria_id', 2)->get();

        if (!empty($check_gks[0])) {
            foreach ($check_gks as $check_gk) {
                $check_pgks = PenilaianGagasanKreatif::where('prestasi_id', $check_gk->id)->get();

                if (!empty($check_pgks[0])) {
                    foreach ($check_pgks as $check_pgk) {
                        PenilaianGagasanKreatif::destroy('id', $check_pgk->id);
                    }
                }

                if (!empty($check_gk->file)) {
                    Storage::delete($check_gk->file);
                }

                Prestasi::destroy('id', $check_gk->id);
            }
        }

        $check_pis = Prestasi::where('tahun_seleksi_id', $tahunSeleksi->id)->where('kriteria_id', 4)->get();

        if (!empty($check_pis[0])) {
            foreach ($check_pis as $check_pi) {
                $check_ppis = PenilaianProdukInovatif::where('prestasi_id', $check_pi->id)->get();

                if (!empty($check_ppis[0])) {
                    foreach ($check_ppis as $check_ppi) {
                        PenilaianProdukInovatif::destroy('id', $check_ppi->id);
                    }
                }

                if (!empty($check_pi->file)) {
                    Storage::delete($check_pi->file);
                }

                Prestasi::destroy('id', $check_pi->id);
            }
        }

        $tahunSeleksi->destroy('id', $tahunSeleksi->id);

        return redirect('/dashboard/tahun-seleksi')->with('success', 'Pelaksanaan seleksi berhasil dihapus.');
    }
}
