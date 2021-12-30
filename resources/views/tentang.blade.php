@extends('layouts.main')

@section('container')
    <header class="mb-3">
        <h1>Tentang Sistem</h1>
    </header>
    <div class="row">
        <div class="col-md-8">
            <p>Sistem Pendukung Keputusan Pemilihan Mahasiswa Berprestasi merupakan sistem yang digunakan untuk memilih Mahasiswa berprestasi menggunakan metode <i>Weighted Product</i>. Sistem ini menggunakan 2 kriteria penilaian untuk masing-masing program pendidikan dalam melakukan Pemilihan Mahasiswa Berprestasi.</p>
            <p>
                Kriteria penilaian Pemilihan Mahasiswa Berprestasi untuk program pendidikan sarjana, yaitu:
                <ol>
                    <li>Nilai Capaian Unggulan (CU),</li>
                    <li>Nilai Gagasan Kreatif (GK)</li>
                </ol>
            </p>
            <p>
                Kriteria penilaian Pemilihan Mahasiswa Berprestasi untuk program pendidikan diploma, yaitu:
                <ol>
                    <li>Nilai Capaian Unggulan (CU),</li>
                    <li>Nilai Produk Inovatif (PI)</li>
                </ol>
            </p>
        </div>
    </div>
@endsection