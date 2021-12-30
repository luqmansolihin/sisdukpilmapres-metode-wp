@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        @if (!empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0]))
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Sarjana</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
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
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Diploma</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data_diploma" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
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
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @elseif (!empty($hasil_sarjanas[0]) && empty($hasil_diplomas[0]))
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Sarjana</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
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
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Diploma</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data_diploma" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </thead>
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @elseif (empty($hasil_sarjanas[0]) && !empty($hasil_diplomas[0]))
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Sarjana</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </thead>
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Seleksi Program Pendidikan Diploma</h3>
                    </div>
                    <!-- /.card-header -->
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_data_diploma" class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
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
                                <tfoot class="thead-dark">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Pokok Mahasiswa</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Peringkat</th>                
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @else
            <div class="col-lg-12">
                <h4>Hasil pemilihan mahasiswa berprestasi saat ini belum dapat ditampilkan.</h4>
                <span>Silahkan cek kembali halaman ini secara berkala.</span>
            </div>
        @endif
    </div>
@endsection