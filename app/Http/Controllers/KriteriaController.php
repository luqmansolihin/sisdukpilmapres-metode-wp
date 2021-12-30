<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    public function show()
    {
        return view('dashboard.kriteria.show', [
            'title'             => 'Pengaturan Bobot Kriteria',
            'user'              => User::find(Auth::user()->id),
            'kriteria_sarjanas' => Kriteria::where('program_pendidikan', 'Sarjana')->get(),
            'kriteria_diplomas' => Kriteria::where('program_pendidikan', 'Diploma')->get()
        ]);
    }

    public function edit()
    {
        return view('dashboard.kriteria.edit', [
            'title'             => 'Edit Bobot Kriteria',
            'user'              => User::find(Auth::user()->id),
            'kriteria_sarjanas' => Kriteria::where('program_pendidikan', 'Sarjana')->get(),
            'kriteria_diplomas' => Kriteria::where('program_pendidikan', 'Diploma')->get()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'capaian_unggulan_sarjana'              => 'required|numeric|between:0,100',
            'gagasan_kreatif_sarjana'               => 'required|numeric|between:0,100',
            'capaian_unggulan_diploma'              => 'required|numeric|between:0,100',
            'produk_inovatif_diploma'               => 'required|numeric|between:0,100',
            'keterangan_capaian_unggulan_sarjana'   => 'required',
            'keterangan_gagasan_kreatif_sarjana'    => 'required',
            'keterangan_capaian_unggulan_diploma'   => 'required',
            'keterangan_produk_inovatif_diploma'    => 'required',
        ]);

        $jumlah_bobot_sarjana   = $validatedData['capaian_unggulan_sarjana'] + $validatedData['gagasan_kreatif_sarjana'];
        $bobot_normalisasi1     = $validatedData['capaian_unggulan_sarjana'] / $jumlah_bobot_sarjana;
        $bobot_normalisasi2     = $validatedData['gagasan_kreatif_sarjana'] / $jumlah_bobot_sarjana;

        if ($validatedData['keterangan_capaian_unggulan_sarjana'] == 'benefit') {
            $bobot_pangkat1 = $bobot_normalisasi1;
        } elseif ($validatedData['keterangan_capaian_unggulan_sarjana'] == 'cost') {
            $bobot_pangkat1 = '-' . $bobot_normalisasi1;
        }

        if ($validatedData['keterangan_gagasan_kreatif_sarjana'] == 'benefit') {
            $bobot_pangkat2 = $bobot_normalisasi2;
        } elseif ($validatedData['keterangan_gagasan_kreatif_sarjana'] == 'cost') {
            $bobot_pangkat2 = '-' . $bobot_normalisasi2;
        }

        Kriteria::where('id', $request->id0_sarjana)
            ->update([
                'bobot'             => $validatedData['capaian_unggulan_sarjana'],
                'keterangan'        => $validatedData['keterangan_capaian_unggulan_sarjana'],
                'bobot_normalisasi' => $bobot_normalisasi1,
                'bobot_pangkat'     => $bobot_pangkat1
            ]);

        Kriteria::where('id', $request->id1_sarjana)
            ->update([
                'bobot'             => $validatedData['gagasan_kreatif_sarjana'],
                'keterangan'        => $validatedData['keterangan_gagasan_kreatif_sarjana'],
                'bobot_normalisasi' => $bobot_normalisasi2,
                'bobot_pangkat'     => $bobot_pangkat2
            ]);

        $jumlah_bobot_diploma   = $validatedData['capaian_unggulan_diploma'] + $validatedData['produk_inovatif_diploma'];
        $bobot_normalisasi1     = $validatedData['capaian_unggulan_diploma'] / $jumlah_bobot_diploma;
        $bobot_normalisasi2     = $validatedData['produk_inovatif_diploma'] / $jumlah_bobot_diploma;

        if ($validatedData['keterangan_capaian_unggulan_diploma'] == 'benefit') {
            $bobot_pangkat1 = $bobot_normalisasi1;
        } elseif ($validatedData['keterangan_capaian_unggulan_diploma'] == 'cost') {
            $bobot_pangkat1 = '-' . $bobot_normalisasi1;
        }

        if ($validatedData['keterangan_produk_inovatif_diploma'] == 'benefit') {
            $bobot_pangkat2 = $bobot_normalisasi2;
        } elseif ($validatedData['keterangan_produk_inovatif_diploma'] == 'cost') {
            $bobot_pangkat2 = '-' . $bobot_normalisasi2;
        }

        Kriteria::where('id', $request->id0_diploma)
            ->update([
                'bobot'             => $validatedData['capaian_unggulan_diploma'],
                'keterangan'        => $validatedData['keterangan_capaian_unggulan_diploma'],
                'bobot_normalisasi' => $bobot_normalisasi1,
                'bobot_pangkat'     => $bobot_pangkat1
            ]);

        Kriteria::where('id', $request->id1_diploma)
            ->update([
                'bobot'             => $validatedData['produk_inovatif_diploma'],
                'keterangan'        => $validatedData['keterangan_produk_inovatif_diploma'],
                'bobot_normalisasi' => $bobot_normalisasi2,
                'bobot_pangkat'     => $bobot_pangkat2
            ]);

        return redirect('/dashboard/kriteria')->with('success', 'Bobot kriteria berhasil diperbaharui.');
    }
}
