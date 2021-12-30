@extends('layouts.main')

@section('container')
    @if (!empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0]))
        <header class="text-center mb-3">
            <h1>HASIL PEMILIHAN MAHASISWA BERPRESTASI</h1>
            <span>Berikut adalah hasil Pemilihan Mahasiswa Berprestasi dengan Metode <i>Weighted Product</i>.</span>
        </header>
        <div class="table-responsive">
            <table class="table table-striped table-hover caption-top">
                <caption class="text-dark text-center"><h4>PERINGKAT 10 BESAR PEMILIHAN MAHASISWA BERPRESTASI PROGRAM PENDIDIKAN SARJANA</h4></caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Pokok Mahasiswa</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Peringkat</th>                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil_sarjanas as $hasil)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hasil->mahasiswa->name }}</td>
                            <td>{{ $hasil->mahasiswa->npm }}</td>
                            <td>{{ $hasil->mahasiswa->program_studi }}</td>
                            <td>{{ $hasil->vektor_v }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <table class="table table-striped table-hover caption-top">
                <caption class="text-dark text-center"><h4>PERINGKAT 10 BESAR PEMILIHAN MAHASISWA BERPRESTASI PROGRAM PENDIDIKAN DIPLOMA</h4></caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Pokok Mahasiswa</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Peringkat</th>                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil_diplomas as $hasil)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hasil->mahasiswa->name }}</td>
                            <td>{{ $hasil->mahasiswa->npm }}</td>
                            <td>{{ $hasil->mahasiswa->program_studi }}</td>
                            <td>{{ $hasil->vektor_v }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif (!empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0]))
        <header class="text-center mb-3">
            <h1>HASIL PEMILIHAN MAHASISWA BERPRESTASI</h1>
            <span>Berikut adalah hasil Pemilihan Mahasiswa Berprestasi dengan Metode <i>Weighted Product</i>.</span>
        </header>
        <div class="table-responsive">
            <table class="table table-striped table-hover caption-top">
                <caption class="text-dark text-center"><h4>PERINGKAT 10 BESAR PEMILIHAN MAHASISWA BERPRESTASI PROGRAM PENDIDIKAN SARJANA</h4></caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Pokok Mahasiswa</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Peringkat</th>                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil_sarjanas as $hasil)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hasil->mahasiswa->name }}</td>
                            <td>{{ $hasil->mahasiswa->npm }}</td>
                            <td>{{ $hasil->mahasiswa->program_studi }}</td>
                            <td>{{ $hasil->vektor_v }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif (empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0]))
        <header class="text-center mb-3">
            <h1>HASIL PEMILIHAN MAHASISWA BERPRESTASI</h1>
            <span>Berikut adalah hasil Pemilihan Mahasiswa Berprestasi dengan Metode <i>Weighted Product</i>.</span>
        </header>
        <div class="table-responsive">
            <table class="table table-striped table-hover caption-top">
                <caption class="text-dark text-center"><h4>PERINGKAT 10 BESAR PEMILIHAN MAHASISWA BERPRESTASI PROGRAM PENDIDIKAN DIPLOMA</h4></caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Pokok Mahasiswa</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Peringkat</th>                
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil_diplomas as $hasil)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hasil->mahasiswa->name }}</td>
                            <td>{{ $hasil->mahasiswa->npm }}</td>
                            <td>{{ $hasil->mahasiswa->program_studi }}</td>
                            <td>{{ $hasil->vektor_v }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <header class="text-center mb-3">
            <h1>HASIL PEMILIHAN MAHASISWA BERPRESTASI SAAT INI BELUM DAPAT DITAMPILKAN.</h1>
            <span>Silahkan cek kembali halaman ini secara berkala.</span>
        </header>
    @endif
@endsection