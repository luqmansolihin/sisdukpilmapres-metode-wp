@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Prestasi Capaian Unggulan Program Pendidikan Sarjana</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_data_sarjana" class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($prestasi_sarjanas)
                                    @foreach ($prestasi_sarjanas as $prestasi_sarjana)
                                        @if (!empty($prestasi_sarjana->penilaian_capaian_unggulan[0]))
                                            <tr>
                                                <td>{{ $prestasi_sarjana->mahasiswa->name }}</td>
                                                <td>{{ $prestasi_sarjana->mahasiswa->npm }}</td>
                                                <td>{{ $prestasi_sarjana->mahasiswa->program_studi }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$prestasi_sarjana->mahasiswa->npm.'/edit') }}" class="badge bg-warning" title="Edit" target="blank"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
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
                    <h3 class="card-title">Data Prestasi Capaian Unggulan Program Pendidikan Diploma</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_data_diploma" class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($prestasi_diplomas)
                                    @foreach ($prestasi_diplomas as $prestasi_diploma)
                                        @if (!empty($prestasi_diploma->penilaian_capaian_unggulan[0]))
                                            <tr>
                                                <td>{{ $prestasi_diploma->mahasiswa->name }}</td>
                                                <td>{{ $prestasi_diploma->mahasiswa->npm }}</td>
                                                <td>{{ $prestasi_diploma->mahasiswa->program_studi }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$prestasi_diploma->mahasiswa->npm.'/edit') }}" class="badge bg-warning" title="Edit" target="blank"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
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
    </div>
@endsection