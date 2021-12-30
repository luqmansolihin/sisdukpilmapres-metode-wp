@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg mb-3">
            @if (session()->has('success'))
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('success') }}
                        <button data-dismiss="toast" type="button" class="ml-xl-8 mb-1 close" aria-label="Close">
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
                    <h3 class="card-title">Data Pelaksanaan Seleksi</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-lg-2 p-0 mb-2">
                            <a href="{{ url('/dashboard/tahun-seleksi/create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                        <table id="table_data_tahun_seleksi" class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Tanggal Buka</th>
                                    <th scope="col">Tanggal Tutup</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahun_seleksis as $tahun_seleksi)    
                                    <tr>
                                        <td>{{ $tahun_seleksi->tahun_akademik }}</td>
                                        <td>{{ $tahun_seleksi->tanggal_buka->format('d-F-Y H:i:s') }}</td>
                                        <td>{{ $tahun_seleksi->tanggal_tutup->format('d-F-Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/tahun-seleksi/'.$tahun_seleksi->tahun_akademik) }}" class="badge bg-info" title="Lihat"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/dashboard/tahun-seleksi/'.$tahun_seleksi->tahun_akademik.'/edit') }}" class="badge bg-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ url('/dashboard/tahun-seleksi/'.$tahun_seleksi->tahun_akademik) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin data akan dihapus?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="thead-dark">
                                <tr>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Tanggal Buka</th>
                                    <th scope="col">Tanggal Tutup</th>
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