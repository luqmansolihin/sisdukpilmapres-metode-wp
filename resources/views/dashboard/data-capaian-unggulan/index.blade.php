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
                                    @foreach ($prestasi_sarjanas as $prestasi)
                                        @if (!empty($prestasi->penilaian_capaian_unggulan[0]))    
                                            <tr>
                                                <td>{{ $prestasi->mahasiswa->name }}</td>
                                                <td>{{ $prestasi->mahasiswa->npm }}</td>
                                                <td>{{ $prestasi->mahasiswa->program_studi }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/data-prestasi/capaian-unggulan/'.$prestasi->mahasiswa->npm) }}" class="badge bg-info" title="Show" target="blank"><i class="fas fa-eye"></i></a>
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
                                    @foreach ($prestasi_diplomas as $prestasi)
                                        @if (!empty($prestasi->penilaian_capaian_unggulan[0]))    
                                            <tr>
                                                <td>{{ $prestasi->mahasiswa->name }}</td>
                                                <td>{{ $prestasi->mahasiswa->npm }}</td>
                                                <td>{{ $prestasi->mahasiswa->program_studi }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/data-prestasi/capaian-unggulan/'.$prestasi->mahasiswa->npm) }}" class="badge bg-info" title="Show" target="blank"><i class="fas fa-eye"></i></a>
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