@extends('layouts.main')

@section('container')
    <header class="text-center mb-3">
        <h1>ALUR PEMILIHAN MAHASISWA BERPRESTASI</h1>
        <span>Ikuti secara urut dan pastikan data prestasi sudah tersimpan dalam sistem.</span>
    </header>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-dark text-center border-primary bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">1. <i>Login</i> dan Isikan Data Prestasi.</h5>
                    <p class="card-text">Mahasiswa melakukan pendaftaran terlebih dahulu ke SPK Pilmapres dan mengisikan data identitas diri sesuai dengan <i>form</i> yang sudah disediakan. Mahasiswa yang sudah memiliki akun, silahkan melakukan <i>login</i>. Isikan portofolio <b>Capaian Unggulan (CU)</b> yang dimiliki dan unggah naskah <b>Gagasan Kreatif (GK)</b> untuk program pendidikan sarjana atau unggah naskah <b>Produk Inovatif (PI)</b> untuk program pendidikan diploma.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-dark text-center border-primary bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">2. Tunggu Juri Melakukan Verifikasi Portofolio Capaian Unggulan (CU) dan Penilaian Naskah Gagasan Kreatif (GK)/Produk Inovatif (PI).</h5>
                    <p class="card-text">Juri yang sudah ditentukan akan melakukan verifikasi terhadap portofolio <b>Capaian Unggulan (CU)</b> yang telah diisi oleh Mahasiswa dan penilaian naskah <b>Gagasan Kreatif (GK)/Produk Inovatif (PI)</b> yang sudah diunggah oleh Mahasiswa ke SPK Pilmapres.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-dark text-center border-primary bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">3. SPK Pilmapres Menghitung Nilai Prestasi dan Menentukan Peringkat Mahasiswa Berprestasi.</h5>
                    <p class="card-text">Perhitungan untuk menentukan peringkat hasil Pilmapres secara terkomputerisasi sesuai program pendidikan. Program pendidikan sarjana dihitung berdasarkan nilai <b>Capaian Unggulan (CU)</b> dan <b>Gagasan Kreatif (GK)</b>. Program pendidikan diploma dihitung berdasarkan nilai <b>Capaian Unggulan (CU)</b> dan <b>Produk Inovatif (PI)</b>.
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-dark text-center border-primary bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">4. Peringkat Hasil Pemilihan Mahasiswa Berprestasi.</h5>
                    <p class="card-text">Peringkat hasil Pilmapres dibedakan menjadi dua berdasarkan program pendidikan, yaitu program sarjana dan program diploma. Peringkat 10 besar hasil Pilmapres akan ditampilkan pada halaman <b>"Hasil Seleksi"</b> sebagai <i>guest</i>. Peringkat masing-masing Mahasiswa dapat dilihat dengan melakukan <i>login</i> ke SPK Pilmapres dan mengakses menu <b>"Hasil Seleksi"</b>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection