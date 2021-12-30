<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use App\Models\TempHasil;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HitungSeleksiController extends Controller
{
    public function index()
    {
        return view('dashboard.hitung-seleksi.index', [
            'title' => 'Hitung Seleksi',
            'user'  => User::find(Auth::user()->id)
        ]);
    }

    public function show()
    {
        DB::table('temp_hasils')->truncate();

        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if (!empty($tahun_seleksi[0])) {
            $mahasiswa_aktifs = User::where('role', 'mahasiswa')->where('status', 'aktif')->get();

            $mahasiswa_sarjanas = Mahasiswa::where('program_pendidikan', 'Sarjana')->whereIn('user_id', Arr::pluck($mahasiswa_aktifs, 'id'))->get();

            $mahasiswa_diplomas = Mahasiswa::where('program_pendidikan', 'Diploma')->whereIn('user_id', Arr::pluck($mahasiswa_aktifs, 'id'))->get();

            $prestasi_sarjanas = Prestasi::with(['mahasiswa', 'kriteria', 'tahun_seleksi'])->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();

            $prestasi_diplomas = Prestasi::with(['mahasiswa', 'kriteria', 'tahun_seleksi'])->where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();

            $grouped_prestasi_sarjanas = $prestasi_sarjanas->groupBy('mahasiswa_id');

            $grouped_prestasi_diplomas = $prestasi_diplomas->groupBy('mahasiswa_id');

            $kriteria_sarjanas = Kriteria::where('program_pendidikan', 'Sarjana')->get();

            $kriteria_diplomas = Kriteria::where('program_pendidikan', 'Diploma')->get();

            if (!empty($prestasi_sarjanas[0]) && !empty($prestasi_diplomas[0])) {
                foreach ($grouped_prestasi_sarjanas as $prestasi) {
                    $product = 1;

                    $j = 0;

                    foreach ($prestasi as $nilai_prestasi) {
                        $nilai = $nilai_prestasi->nilai;

                        $product *= pow($nilai, $kriteria_sarjanas[$j]->bobot_pangkat);

                        $j++;
                    }

                    if ($product != 0) {
                        TempHasil::create([
                            'mahasiswa_id'      => $prestasi[0]->mahasiswa_id,
                            'vektor_s'          => $product,
                            'vektor_v'          => 0,
                            'rangking'          => 0,
                            'tahun_seleksi_id'  => $tahun_seleksi[0]->id
                        ]);
                    }
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();

                $sum_vektor_s = $temp_hasils->sum('vektor_s');

                foreach ($temp_hasils as $temp_hasil) {
                    $vektor_v = 0;

                    $vektor_v = $temp_hasil->vektor_s / $sum_vektor_s;

                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'vektor_v' => $vektor_v
                        ]);
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->orderBy('vektor_v', 'desc')->get();

                $rangking = 1;

                foreach ($temp_hasils as $temp_hasil) {
                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'rangking' => $rangking
                        ]);

                    $rangking++;
                }

                $temp_hasil_sarjanas = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();

                foreach ($grouped_prestasi_diplomas as $prestasi) {
                    $product = 1;

                    $j = 0;

                    foreach ($prestasi as $nilai_prestasi) {
                        $nilai = $nilai_prestasi->nilai;

                        $product *= pow($nilai, $kriteria_diplomas[$j]->bobot_pangkat);

                        $j++;
                    }

                    if ($product != 0) {
                        TempHasil::create([
                            'mahasiswa_id'      => $prestasi[0]->mahasiswa_id,
                            'vektor_s'          => $product,
                            'vektor_v'          => 0,
                            'rangking'          => 0,
                            'tahun_seleksi_id'  => $tahun_seleksi[0]->id
                        ]);
                    }
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();

                $sum_vektor_s = $temp_hasils->sum('vektor_s');

                foreach ($temp_hasils as $temp_hasil) {
                    $vektor_v = 0;

                    $vektor_v = $temp_hasil->vektor_s / $sum_vektor_s;

                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'vektor_v' => $vektor_v
                        ]);
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->orderBy('vektor_v', 'desc')->get();

                $rangking = 1;

                foreach ($temp_hasils as $temp_hasil) {
                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'rangking' => $rangking
                        ]);

                    $rangking++;
                }

                $temp_hasil_diplomas = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();

                if (!empty($temp_hasil_sarjanas[0]) && !empty($temp_hasil_diplomas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                        'temp_hasil_sarjanas'   => $temp_hasil_sarjanas,
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                        'temp_hasil_diplomas'   => $temp_hasil_diplomas
                    ]);
                } elseif (!empty($temp_hasil_sarjanas[0]) && empty($temp_hasil_diplomas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                        'temp_hasil_sarjanas'   => $temp_hasil_sarjanas,
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                        'temp_hasil_diplomas'   => ''
                    ]);
                } elseif (empty($temp_hasil_sarjanas[0]) && !empty($temp_hasil_diplomas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                        'temp_hasil_sarjanas'   => '',
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                        'temp_hasil_diplomas'   => $temp_hasil_diplomas
                    ]);
                } elseif (empty($temp_hasil_sarjanas[0]) && empty($temp_hasil_diplomas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                        'temp_hasil_sarjanas'   => '',
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                        'temp_hasil_diplomas'   => ''
                    ]);
                }
            } elseif (!empty($prestasi_sarjanas[0]) && empty($prestasi_diplomas[0])) {
                foreach ($grouped_prestasi_sarjanas as $prestasi) {
                    $product = 1;

                    $j = 0;

                    foreach ($prestasi as $nilai_prestasi) {

                        $nilai = $nilai_prestasi->nilai;

                        $product *= pow($nilai, $kriteria_sarjanas[$j]->bobot_pangkat);

                        $j++;
                    }

                    if ($product != 0) {
                        TempHasil::create([
                            'mahasiswa_id'      => $prestasi[0]->mahasiswa_id,
                            'vektor_s'          => $product,
                            'vektor_v'          => 0,
                            'rangking'          => 0,
                            'tahun_seleksi_id'  => $tahun_seleksi[0]->id
                        ]);
                    }
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();

                $sum_vektor_s = $temp_hasils->sum('vektor_s');

                foreach ($temp_hasils as $temp_hasil) {
                    $vektor_v = 0;

                    $vektor_v = $temp_hasil->vektor_s / $sum_vektor_s;

                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'vektor_v' => $vektor_v
                        ]);
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->orderBy('vektor_v', 'desc')->get();

                $rangking = 1;

                foreach ($temp_hasils as $temp_hasil) {
                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'rangking' => $rangking
                        ]);

                    $rangking++;
                }

                $temp_hasil_sarjanas = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->get();

                if (!empty($temp_hasil_sarjanas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                        'temp_hasil_sarjanas'   => $temp_hasil_sarjanas,
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => '',
                        'temp_hasil_diplomas'   => ''
                    ]);
                }

                return view('dashboard.hitung-seleksi.show', [
                    'title'                 => 'Hitung Seleksi',
                    'user'                  => User::find(Auth::user()->id),
                    'kriteria_sarjanas'     => $kriteria_sarjanas,
                    'prestasi_sarjanas'     => $grouped_prestasi_sarjanas,
                    'temp_hasil_sarjanas'   => '',
                    'kriteria_diplomas'     => $kriteria_diplomas,
                    'prestasi_diplomas'     => '',
                    'temp_hasil_diplomas'   => ''
                ]);
            } elseif (empty($prestasi_sarjanas[0]) && !empty($prestasi_diplomas[0])) {
                foreach ($grouped_prestasi_diplomas as $prestasi) {
                    $product = 1;

                    $j = 0;

                    foreach ($prestasi as $nilai_prestasi) {

                        $nilai = $nilai_prestasi->nilai;

                        $product *= pow($nilai, $kriteria_diplomas[$j]->bobot_pangkat);

                        $j++;
                    }

                    if ($product != 0) {
                        TempHasil::create([
                            'mahasiswa_id'      => $prestasi[0]->mahasiswa_id,
                            'vektor_s'          => $product,
                            'vektor_v'          => 0,
                            'rangking'          => 0,
                            'tahun_seleksi_id'  => $tahun_seleksi[0]->id
                        ]);
                    }
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();

                $sum_vektor_s = $temp_hasils->sum('vektor_s');

                foreach ($temp_hasils as $temp_hasil) {
                    $vektor_v = 0;

                    $vektor_v = $temp_hasil->vektor_s / $sum_vektor_s;

                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'vektor_v' => $vektor_v
                        ]);
                }

                $temp_hasils = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->orderBy('vektor_v', 'desc')->get();

                $rangking = 1;

                foreach ($temp_hasils as $temp_hasil) {
                    TempHasil::where('id', $temp_hasil->id)
                        ->update([
                            'rangking' => $rangking
                        ]);

                    $rangking++;
                }

                $temp_hasil_diplomas = TempHasil::whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->get();

                if (!empty($temp_hasil_diplomas[0])) {
                    return view('dashboard.hitung-seleksi.show', [
                        'title'                 => 'Hitung Seleksi',
                        'user'                  => User::find(Auth::user()->id),
                        'kriteria_sarjanas'     => $kriteria_sarjanas,
                        'prestasi_sarjanas'     => '',
                        'temp_hasil_sarjanas'   => '',
                        'kriteria_diplomas'     => $kriteria_diplomas,
                        'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                        'temp_hasil_diplomas'   => $temp_hasil_diplomas
                    ]);
                }

                return view('dashboard.hitung-seleksi.show', [
                    'title'                 => 'Hitung Seleksi',
                    'user'                  => User::find(Auth::user()->id),
                    'kriteria_sarjanas'     => $kriteria_sarjanas,
                    'prestasi_sarjanas'     => '',
                    'temp_hasil_sarjanas'   => '',
                    'kriteria_diplomas'     => $kriteria_diplomas,
                    'prestasi_diplomas'     => $grouped_prestasi_diplomas,
                    'temp_hasil_diplomas'   => ''
                ]);
            } elseif (empty($prestasi_sarjanas[0]) && empty($prestasi_diplomas[0])) {
                return view('dashboard.hitung-seleksi.show', [
                    'title'                 => 'Hitung Seleksi',
                    'user'                  => User::find(Auth::user()->id),
                    'kriteria_sarjanas'     => $kriteria_sarjanas,
                    'prestasi_sarjanas'     => '',
                    'temp_hasil_sarjanas'   => '',
                    'kriteria_diplomas'     => $kriteria_diplomas,
                    'prestasi_diplomas'     => '',
                    'temp_hasil_diplomas'   => ''
                ]);
            }
        }

        abort(404);
    }

    public function store()
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if (!empty($tahun_seleksi[0])) {
            $temp_hasils = TempHasil::all();

            if (!empty($temp_hasils[0])) {
                $hasils = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->get();

                if (!empty($hasils[0])) {
                    foreach ($hasils as $hasil) {
                        Hasil::destroy('id', $hasil->id);
                    }
                }

                foreach ($temp_hasils as $temp_hasil) {
                    Hasil::create([
                        'mahasiswa_id'      => $temp_hasil->mahasiswa_id,
                        'vektor_s'          => $temp_hasil->vektor_s,
                        'vektor_v'          => $temp_hasil->vektor_v,
                        'rangking'          => $temp_hasil->rangking,
                        'tahun_seleksi_id'  => $temp_hasil->tahun_seleksi_id
                    ]);
                }

                return redirect('/dashboard/hitung-seleksi')->with('success', 'Perhitungan seleksi berhasil tersimpan.');
            }

            return redirect('/dashboard/hitung-seleksi')->with('error', 'Tidak ada data yang tersimpan.');
        }

        abort(404);
    }
}
