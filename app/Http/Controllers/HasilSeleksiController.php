<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilSeleksiController extends Controller
{
    public function index()
    {
        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'dosen') {
            if (!empty($tahun_seleksi[0])) {
                $mahasiswa_sarjanas = Mahasiswa::select('id')->where('program_pendidikan', 'Sarjana')->get();

                $mahasiswa_diplomas = Mahasiswa::select('id')->where('program_pendidikan', 'Diploma')->get();

                $hasil_sarjanas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_sarjanas, 'id'))->orderBy('rangking', 'asc')->get();

                $hasil_diplomas = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->whereIn('mahasiswa_id', Arr::pluck($mahasiswa_diplomas, 'id'))->orderBy('rangking', 'asc')->get();

                if (!empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                    return view('dashboard.hasil-seleksi.index', [
                        'title'             => 'Hasil Seleksi',
                        'user'              => User::find(Auth::user()->id),
                        'hasil_sarjanas'    => $hasil_sarjanas,
                        'hasil_diplomas'    => $hasil_diplomas
                    ]);
                } elseif (!empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                    return view('dashboard.hasil-seleksi.index', [
                        'title'             => 'Hasil Seleksi',
                        'user'              => User::find(Auth::user()->id),
                        'hasil_sarjanas'    => $hasil_sarjanas,
                        'hasil_diplomas'    => ''
                    ]);
                } elseif (empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0])) {
                    return view('dashboard.hasil-seleksi.index', [
                        'title'             => 'Hasil Seleksi',
                        'user'              => User::find(Auth::user()->id),
                        'hasil_sarjanas'    => '',
                        'hasil_diplomas'    => $hasil_diplomas
                    ]);
                } elseif (empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0])) {
                    return view('dashboard.hasil-seleksi.index', [
                        'title'             => 'Hasil Seleksi',
                        'user'              => User::find(Auth::user()->id),
                        'hasil_sarjanas'    => '',
                        'hasil_diplomas'    => ''
                    ]);
                }
            }
            return view('dashboard.hasil-seleksi.index', [
                'title'             => 'Hasil Seleksi',
                'user'              => User::find(Auth::user()->id),
                'hasil_sarjanas'    => '',
                'hasil_diplomas'    => ''
            ]);
        } elseif (Auth::user()->role == 'mahasiswa') {
            if (!empty($tahun_seleksi[0])) {
                $hasils = Hasil::where('tahun_seleksi_id', $tahun_seleksi[0]->id)->where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();

                if (!empty($hasils[0])) {
                    return view('dashboard.hasil-seleksi.index-mahasiswa', [
                        'title'     => 'Hasil Seleksi',
                        'user'      => User::find(Auth::user()->id),
                        'hasils'    => $hasils
                    ]);
                } else {
                    return view('dashboard.hasil-seleksi.index-mahasiswa', [
                        'title'     => 'Hasil Seleksi',
                        'user'      => User::find(Auth::user()->id),
                        'hasils'    => ''
                    ]);
                }
            }
            return view('dashboard.hasil-seleksi.index-mahasiswa', [
                'title'     => 'Hasil Seleksi',
                'user'      => User::find(Auth::user()->id),
                'hasils'    => ''
            ]);
        }
    }
}
