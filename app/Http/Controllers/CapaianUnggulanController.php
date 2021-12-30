<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Prestasi;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use App\Models\CapaianUnggulan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\PenilaianCapaianUnggulan;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CapaianUnggulanController extends Controller
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
            if (Auth::user()->mahasiswa->program_pendidikan == 'Sarjana') {
                $prestasi = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 1)->get();
            } elseif (Auth::user()->mahasiswa->program_pendidikan == 'Diploma') {
                $prestasi = Prestasi::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', 3)->get();
            }

            if (!empty($prestasi[0])) {
                $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('prestasi_id', $prestasi[0]->id)->get();

                return view('dashboard.capaian-unggulan.index', [
                    'title'                         => 'Data Prestasi Capaian Unggulan',
                    'user'                          => User::find(Auth::user()->id),
                    'penilaian_capaian_unggulans'   => $penilaian_capaian_unggulan
                ]);
            }

            return view('dashboard.capaian-unggulan.index', [
                'title'                         => 'Data Prestasi Capaian Unggulan',
                'user'                          => User::find(Auth::user()->id),
                'penilaian_capaian_unggulans'   => ''
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

        if (Auth::user()->mahasiswa->program_pendidikan == 'Sarjana') {
            $kriteria = Kriteria::where('name', 'Capaian Unggulan')->where('program_pendidikan', 'Sarjana')->get();
        } elseif (Auth::user()->mahasiswa->program_pendidikan == 'Diploma') {
            $kriteria = Kriteria::where('name', 'Capaian Unggulan')->where('program_pendidikan', 'Diploma')->get();
        }

        if (!empty($tahun_seleksi[0])) {
            return view('dashboard.capaian-unggulan.create', [
                'title'             => 'Masukan Capaian Unggulan',
                'user'              => User::find(Auth::user()->id),
                'seleksi'           => $tahun_seleksi[0],
                'capaian_unggulans' => CapaianUnggulan::all(),
                'kriteria'          => $kriteria[0]
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
            'kode'      => 'required',
            'name'      => 'required|string|max:255',
            'image'     => 'required|image|file|max:1024',
            'penerbit'  => 'required|url'
        ]);

        $check_prestasi = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', $request->kriteria_id)->where('tahun_seleksi_id', $request->tahun_seleksi_id)->get();

        $check_capaian_unggulan = CapaianUnggulan::where('kode', $validatedData['kode'])->get();

        if (!empty($check_prestasi[0])) {
            $check_penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('prestasi_id', $check_prestasi[0]->id)->get();

            if (count($check_penilaian_capaian_unggulan) < 10) {
                $validatedData['image'] = $request->file('image')->store('capaian-unggulan');

                PenilaianCapaianUnggulan::create([
                    'prestasi_id'           => $check_prestasi[0]->id,
                    'capaian_unggulan_id'   => $check_capaian_unggulan[0]->id,
                    'name'                  => $validatedData['name'],
                    'slug'                  => SlugService::createSlug(PenilaianCapaianUnggulan::class, 'slug', $validatedData['name']),
                    'image'                 => $validatedData['image'],
                    'penerbit'              => $validatedData['penerbit'],
                    'status'                => 'Belum Terverifikasi'
                ]);

                return redirect('/dashboard/prestasi/capaian-unggulan')->with('success', 'Capaian unggulan baru berhasil ditambahkan.');
            }

            return back()->with('error', 'Capaian unggulan yang anda masukkan sudah memenuhi batas maksimal yaitu 10 capaian unggulan.');
        }

        Prestasi::create([
            'mahasiswa_id'      => Auth::user()->mahasiswa->id,
            'kriteria_id'       => $request->kriteria_id,
            'nilai'             => 0,
            'tahun_seleksi_id'  => $request->tahun_seleksi_id
        ]);

        if (Auth::user()->mahasiswa->program_pendidikan == 'Sarjana') {
            $kriteria_id = 2;
        } elseif (Auth::user()->mahasiswa->program_pendidikan == 'Diploma') {
            $kriteria_id = 4;
        }

        Prestasi::create([
            'mahasiswa_id'      => Auth::user()->mahasiswa->id,
            'kriteria_id'       => $kriteria_id,
            'nilai'             => 0,
            'tahun_seleksi_id'  => $request->tahun_seleksi_id
        ]);

        $check_prestasi = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('kriteria_id', $request->kriteria_id)->where('tahun_seleksi_id', $request->tahun_seleksi_id)->get();

        $validatedData['image'] = $request->file('image')->store('capaian-unggulan');

        PenilaianCapaianUnggulan::create([
            'prestasi_id'           => $check_prestasi[0]->id,
            'capaian_unggulan_id'   => $check_capaian_unggulan[0]->id,
            'name'                  => $validatedData['name'],
            'slug'                  => SlugService::createSlug(PenilaianCapaianUnggulan::class, 'slug', $validatedData['name']),
            'image'                 => $validatedData['image'],
            'penerbit'              => $validatedData['penerbit'],
            'status'                => 'Belum Terverifikasi'
        ]);

        return redirect('/dashboard/prestasi/capaian-unggulan')->with('success', 'Capaian unggulan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function show($slug, PenilaianCapaianUnggulan  $penilaian_capaian_unggulan)
    {
        $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::with('prestasi', 'capaian_unggulan')->where('slug', $slug)->get();
        if (!empty($penilaian_capaian_unggulan[0])) {
            if ($penilaian_capaian_unggulan[0]->prestasi->mahasiswa_id == Auth::user()->mahasiswa->id) {
                return view('dashboard.capaian-unggulan.show', [
                    'title' => 'Detail Prestasi Capaian Unggulan',
                    'user'  => User::find(Auth::user()->id),
                    'pcu'   => $penilaian_capaian_unggulan[0]
                ]);
            }

            abort(404);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, PenilaianCapaianUnggulan  $penilaian_capaian_unggulan)
    {
        $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('slug', $slug)->get();
        if (!empty($penilaian_capaian_unggulan[0])) {
            $tahun_seleksi = TahunSeleksi::where('id', $penilaian_capaian_unggulan[0]->prestasi->tahun_seleksi_id)->get();
            if ($penilaian_capaian_unggulan[0]->prestasi->mahasiswa_id == Auth::user()->mahasiswa->id) {
                return view('dashboard.capaian-unggulan.edit', [
                    'title'             => 'Edit Prestasi Capaian Unggulan',
                    'user'              => User::find(Auth::user()->id),
                    'pcu'               => $penilaian_capaian_unggulan[0],
                    'seleksi'           => $tahun_seleksi[0],
                    'capaian_unggulans' => CapaianUnggulan::all()
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
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianCapaianUnggulan  $penilaian_capaian_unggulan)
    {
        $validatedData = $request->validate([
            'kode'      => 'required',
            'name'      => 'required|string|max:255',
            'image'     => 'image|file|max:1024',
            'penerbit'  => 'required|active_url'
        ]);

        $check_validasi_pcu = PenilaianCapaianUnggulan::where('id', $request->id)->get();

        if ($check_validasi_pcu[0]->status == 'Valid') {
            return redirect('/dashboard/prestasi/capaian-unggulan')->with('error', 'Prestasi capaian unggulan tidak dapat diperbaharui.');
        }

        if ($request->file('image')) {
            $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('id', $request->id)->get();

            Storage::delete($penilaian_capaian_unggulan[0]->image);

            $validatedData['image'] = $request->file('image')->store('capaian-unggulan');

            PenilaianCapaianUnggulan::where('id', $request->id)
                ->update([
                    'image' => $validatedData['image']
                ]);
        }

        $check_capaian_unggulan = CapaianUnggulan::where('kode', $validatedData['kode'])->get();

        PenilaianCapaianUnggulan::where('id', $request->id)
            ->update([
                'capaian_unggulan_id'   => $check_capaian_unggulan[0]->id,
                'name'                  => $validatedData['name'],
                'slug'                  => SlugService::createSlug(PenilaianCapaianUnggulan::class, 'slug', $validatedData['name']),
                'penerbit'              => $validatedData['penerbit']
            ]);

        return redirect('/dashboard/prestasi/capaian-unggulan')->with('success', 'Prestasi capaian unggulan berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianCapaianUnggulan  $penilaian_capaian_unggulan
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, PenilaianCapaianUnggulan  $penilaian_capaian_unggulan)
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if ($tahun_seleksi[0]->tanggal_buka <= now() && $tahun_seleksi[0]->tanggal_tutup >= now()) {
            $penilaian_capaian_unggulan = PenilaianCapaianUnggulan::where('slug', $slug)->get();
            Storage::delete($penilaian_capaian_unggulan[0]->image);

            if ($penilaian_capaian_unggulan[0]->status == 'Valid') {
                $prestasi = Prestasi::where('id', $penilaian_capaian_unggulan[0]->prestasi_id)->get();
                $nilai_baru = $prestasi[0]->nilai - $penilaian_capaian_unggulan[0]->capaian_unggulan->skor;

                Prestasi::where('id', $penilaian_capaian_unggulan[0]->prestasi_id)
                    ->update([
                        'nilai' => $nilai_baru
                    ]);
            }

            $count_pcu = count(PenilaianCapaianUnggulan::where('prestasi_id', $penilaian_capaian_unggulan[0]->prestasi_id)->get());

            if (Auth::user()->mahasiswa->program_pendidikan == 'Sarjana') {
                $check_naskah = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 2)->get();
            } else {
                $check_naskah = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('kriteria_id', 4)->get();
            }

            if ($count_pcu <= 1 && empty($check_naskah[0]->judul)) {
                $prestasis = Prestasi::where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->get();

                foreach ($prestasis as $prestasi) {
                    Prestasi::destroy('id', $prestasi->id);
                }
            }

            PenilaianCapaianUnggulan::destroy('id', $penilaian_capaian_unggulan[0]->id);

            return redirect('/dashboard/prestasi/capaian-unggulan')->with('success', 'Data prestasi capaian unggulan berhasil dihapus.');
        }

        return redirect('/dashboard/prestasi/capaian-unggulan')->with('error', 'Pendaftaran ditutup, data tidak bisa dihapus.');
    }
}
