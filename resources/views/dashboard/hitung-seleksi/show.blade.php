@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hitung Seleksi Program Pendidikan Sarjana</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Data Kriteria</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot Kriteria</th>
                                    <th scope="col">Jenis Kriteria</th>
                                    <th scope="col">Normalisasi Bobot</th>
                                    <th scope="col">Bobot Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria_sarjanas as $kriteria)    
                                    <tr>
                                        <td>{{ $kriteria->name }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>{{ $kriteria->keterangan }}</td>
                                        <td>{{ $kriteria->bobot_normalisasi }}</td>
                                        <td>{{ $kriteria->bobot_pangkat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Normalisasi Bobot<sub>n</sub> = Bobot Kriteria<sub>n</sub> / Total Bobot Kriteria</li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Data Alternatif</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Nilai Capaian Unggulan</th>
                                    <th scope="col">Nilai Gagasan Kreatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($prestasi_sarjanas))
                                    @foreach ($prestasi_sarjanas as $prestasi)    
                                        <tr>
                                            <td>{{ $prestasi[0]->mahasiswa->name }}</td>
                                            <td>{{ $prestasi[0]->mahasiswa->npm }}</td>
                                            @foreach ($prestasi as $nilai_prestasi)
                                                <td>{{ $nilai_prestasi->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Mencari Vektor S</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Vektor S</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_sarjanas[0]))
                                    @foreach ($temp_hasil_sarjanas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->vektor_s }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Vektor S<sub>n</sub> = Nilai Capaian Unggulan<sub>n</sub><sup>Bobot Pangkat Capaian Unggulan</sup> x Nilai Gagasan Kreatif<sub>n</sub><sup>Bobot Pangkat Gagasan Kreatif</sup></li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Mencari Vektor V</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Vektor V</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_sarjanas[0]))
                                    @foreach ($temp_hasil_sarjanas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->vektor_v }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Vektor V<sub>n</sub> = Vektor S<sub>n</sub> / Total Vektor S</li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Melakukan Pemeringkatan</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Peringkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_sarjanas[0]))
                                    @foreach ($temp_hasil_sarjanas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->rangking }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
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
                    <h3 class="card-title">Hitung Seleksi Program Pendidikan Diploma</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Data Kriteria</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot Kriteria</th>
                                    <th scope="col">Jenis Kriteria</th>
                                    <th scope="col">Normalisasi Bobot</th>
                                    <th scope="col">Bobot Pangkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria_diplomas as $kriteria)    
                                    <tr>
                                        <td>{{ $kriteria->name }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>{{ $kriteria->keterangan }}</td>
                                        <td>{{ $kriteria->bobot_normalisasi }}</td>
                                        <td>{{ $kriteria->bobot_pangkat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Normalisasi Bobot<sub>n</sub> = Bobot Kriteria<sub>n</sub> / Total Bobot Kriteria</li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Data Alternatif</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Nilai Capaian Unggulan</th>
                                    <th scope="col">Nilai Produk Inovatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($prestasi_diplomas))
                                    @foreach ($prestasi_diplomas as $prestasi)    
                                        <tr>
                                            <td>{{ $prestasi[0]->mahasiswa->name }}</td>
                                            <td>{{ $prestasi[0]->mahasiswa->npm }}</td>
                                            @foreach ($prestasi as $nilai_prestasi)
                                                <td>{{ $nilai_prestasi->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Mencari Vektor S</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Vektor S</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_diplomas[0]))
                                    @foreach ($temp_hasil_diplomas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->vektor_s }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Vektor S<sub>n</sub> = Nilai Capaian Unggulan<sub>n</sub><sup>Bobot Pangkat Capaian Unggulan</sup> x Nilai Produk Inovatif<sub>n</sub><sup>Bobot Pangkat Produk Inovatif</sup></li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Mencari Vektor V</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Vektor V</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_diplomas[0]))
                                    @foreach ($temp_hasil_diplomas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->vektor_v }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="small">
                            Keterangan
                            <ol>
                                <li>Vektor V<sub>n</sub> = Vektor S<sub>n</sub> / Total Vektor S</li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <h5>Melakukan Pemeringkatan</h5>
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Peringkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($temp_hasil_diplomas[0]))
                                    @foreach ($temp_hasil_diplomas as $temp_hasil)
                                        <tr>
                                            <td>{{ $temp_hasil->mahasiswa->name }}</td>
                                            <td>{{ $temp_hasil->mahasiswa->npm }}</td>
                                            <td>{{ $temp_hasil->rangking }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No data available in table.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <form action="{{ url('/dashboard/hitung-seleksi') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection