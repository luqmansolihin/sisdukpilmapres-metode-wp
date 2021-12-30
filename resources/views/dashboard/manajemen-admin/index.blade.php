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
            @elseif (session()->has('error'))
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('error') }}
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
                    <h3 class="card-title">Data Administrator</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-lg-2 p-0 mb-2">
                            <a href="{{ url('/dashboard/manajemen-admin/create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                        <table id="table_data" class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Identitas Pegawai</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)    
                                    <tr>
                                        <td>{{ $admin->dosen->name }}</td>
                                        <td>{{ $admin->dosen->nip }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/manajemen-admin/'.$admin->dosen->nip) }}" class="badge bg-info" title="Lihat"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/dashboard/manajemen-admin/'.$admin->dosen->nip.'/edit') }}" class="badge bg-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ url('/dashboard/manajemen-admin/'.$admin->dosen->nip) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin admin akan dihapus?')">
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
                                    <th scope="col">Nomor Identitas Pegawai</th>
                                    <th scope="col">Email</th>
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