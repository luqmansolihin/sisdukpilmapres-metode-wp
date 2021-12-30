@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Prestasi Produk Inovatif</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_data" class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Pokok Mahasiswa</th>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($prestasis)
                                    @foreach ($prestasis as $prestasi)
                                        @if (!empty($prestasi->judul))
                                            <tr>
                                                <td>{{ $prestasi->mahasiswa->name }}</td>
                                                <td>{{ $prestasi->mahasiswa->npm }}</td>
                                                <td>{{ $prestasi->mahasiswa->program_studi }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/data-prestasi/produk-inovatif/'.$prestasi->slug) }}" class="badge bg-info" title="Show" target="blank"><i class="fas fa-eye"></i></a>
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