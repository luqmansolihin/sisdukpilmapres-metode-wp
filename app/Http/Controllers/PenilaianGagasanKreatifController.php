<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Arr;
use App\Models\TahunSeleksi;
use Illuminate\Http\Request;
use App\Models\GagasanKreatif;
use Illuminate\Support\Facades\Auth;
use App\Models\PenilaianGagasanKreatif;

class PenilaianGagasanKreatifController extends Controller
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
                return view('dashboard.penilaian-gagasan-kreatif.index', [
                    'title'     => 'Penilaian Prestasi Gagasan Kreatif',
                    'user'      => User::find(Auth::user()->id),
                    'prestasis' => $prestasis
                ]);
            }

            return view('dashboard.penilaian-gagasan-kreatif.index', [
                'title'     => 'Penilaian Prestasi Gagasan Kreatif',
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
    public function show(PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        $prestasi = Prestasi::where('slug', $slug)->where('kriteria_id', 2)->get();

        $tahun_seleksi = TahunSeleksi::orderBy('tahun_akademik', 'desc')->take(1)->get();

        if ($tahun_seleksi[0]->id == $prestasi[0]->tahun_seleksi_id) {
            if (!empty($prestasi[0])) {
                $penilaian_gagasan_kreatif = PenilaianGagasanKreatif::where('prestasi_id', $prestasi[0]->id)->where('dosen_id', Auth::user()->dosen->id)->get();

                $gagasan_kreatifs = GagasanKreatif::all()->load('rubrik_gagasan_kreatif');

                if (!empty($penilaian_gagasan_kreatif[0])) {
                    return view('dashboard.penilaian-gagasan-kreatif.edit', [
                        'title'                         => 'Penilaian Prestasi Gagasan Kreatif',
                        'user'                          => User::find(Auth::user()->id),
                        'prestasi'                      => $prestasi[0],
                        'penilaian_gagasan_kreatifs'    => $penilaian_gagasan_kreatif,
                        'gagasan_kreatifs'              => $gagasan_kreatifs,
                    ]);
                }

                return view('dashboard.penilaian-gagasan-kreatif.edit', [
                    'title'                         => 'Penilaian Prestasi Gagasan Kreatif',
                    'user'                          => User::find(Auth::user()->id),
                    'prestasi'                      => $prestasi[0],
                    'penilaian_gagasan_kreatifs'    => '',
                    'gagasan_kreatifs'              => $gagasan_kreatifs,
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
     * @param  \App\Models\PenilaianGagasanKreatif  $penilaian_gagasan_kreatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenilaianGagasanKreatif $penilaian_gagasan_kreatif)
    {
        $gagasan_kreatifs = GagasanKreatif::all();
        $field = [];
        $validation = [];
        $i = 1;

        foreach ($gagasan_kreatifs as $gk) {
            $field[$i] = 'skor' . $gk->id;
            $validation[$i] = 'required|numeric|between:5,10';
            $i++;
        }

        $skor_terbobot = [
            ($request->bobot1 / 100) * $request->skor1,
            ($request->bobot2 / 100) * $request->skor2,
            ($request->bobot3 / 100) * $request->skor3,
            ($request->bobot4 / 100) * $request->skor4,
            ($request->bobot5 / 100) * $request->skor5,
            ($request->bobot6 / 100) * $request->skor6,
            ($request->bobot7 / 100) * $request->skor7,
            ($request->bobot8 / 100) * $request->skor8,
            ($request->bobot9 / 100) * $request->skor9,
            ($request->bobot10 / 100) * $request->skor10,
            ($request->bobot11 / 100) * $request->skor11,
            ($request->bobot12 / 100) * $request->skor12,
        ];

        $rules = array_combine($field, $validation);

        $validatedData = $request->validate($rules);

        $penilaian_gagasan_kreatif = PenilaianGagasanKreatif::where('prestasi_id', $request->prestasi_id)->where('dosen_id', Auth::user()->dosen->id)->get();

        $hitung_juri = count(User::where('role', 'juri')->where('status', 'aktif')->get());

        if (!empty($penilaian_gagasan_kreatif[0])) {
            $i = 0;

            foreach ($gagasan_kreatifs as $gk) {
                PenilaianGagasanKreatif::where('id', $penilaian_gagasan_kreatif[$i]->id)->update([
                    'skor'          => $validatedData['skor' . $gk->id],
                    'skor_terbobot' => $skor_terbobot[$i]
                ]);

                $i++;
            }

            $check_juri_aktifs = User::where('role', 'juri')->where('status', 'aktif')->get();

            $juri_aktifs = Dosen::whereIn('user_id', Arr::pluck($check_juri_aktifs, 'id'))->get();

            $penilaian_gagasan_kreatif = PenilaianGagasanKreatif::where('prestasi_id', $request->prestasi_id)->whereIn('dosen_id', Arr::pluck($juri_aktifs, 'id'))->get();

            $nilai = array_sum(Arr::pluck($penilaian_gagasan_kreatif, 'skor_terbobot')) / $hitung_juri;

            Prestasi::where('id', $request->prestasi_id)
                ->update([
                    'nilai' => $nilai
                ]);

            return back()->with('success', 'Nilai berhasil diubah.');
        } else {
            $i = 0;

            foreach ($gagasan_kreatifs as $gk) {
                PenilaianGagasanKreatif::create([
                    'prestasi_id'           => $request->prestasi_id,
                    'dosen_id'              => Auth::user()->dosen->id,
                    'gagasan_kreatif_id'    => $gk->id,
                    'skor'                  => $validatedData['skor' . $gk->id],
                    'skor_terbobot'         => $skor_terbobot[$i]
                ]);

                $i++;
            }

            $check_juri_aktifs = User::where('role', 'juri')->where('status', 'aktif')->get();

            $juri_aktifs = Dosen::whereIn('user_id', Arr::pluck($check_juri_aktifs, 'id'))->get();

            $penilaian_gagasan_kreatif = PenilaianGagasanKreatif::where('prestasi_id', $request->prestasi_id)->whereIn('dosen_id', Arr::pluck($juri_aktifs, 'id'))->get();

            $nilai = array_sum(Arr::pluck($penilaian_gagasan_kreatif, 'skor_terbobot')) / $hitung_juri;

            Prestasi::where('id', $request->prestasi_id)
                ->update([
                    'nilai' => $nilai
                ]);

            return back()->with('success', 'Nilai berhasil dimasukkan.');
        }
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
