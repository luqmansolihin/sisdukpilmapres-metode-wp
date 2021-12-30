@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12 mb-3">
            @if (session()->has('success'))
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('success') }}
                        <button data-dismiss="toast" type="button" class="ml-xl-5 mb-1 close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-lg-2 p-0 mb-2">
                            <a href="{{ url('/dashboard/manajemen-mahasiswa/create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
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
                                @foreach ($mahasiswas as $mahasiswa)    
                                    <tr>
                                        <td>{{ $mahasiswa->mahasiswa->name }}</td>
                                        <td>{{ $mahasiswa->mahasiswa->npm }}</td>
                                        <td>{{ $mahasiswa->mahasiswa->program_studi }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->mahasiswa->npm) }}" class="badge bg-info" title="Lihat"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->mahasiswa->npm.'/edit') }}" class="badge bg-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->mahasiswa->npm) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin mahasiswa akan dihapus?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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