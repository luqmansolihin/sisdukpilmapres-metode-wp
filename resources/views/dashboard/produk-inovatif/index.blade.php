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
            @elseif (session()->has('error'))
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('error') }}
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
                    <h3 class="card-title">Data Prestasi Produk Inovatif</h3>
                </div>
                
                <div class="card-body">
                    <div class="col-lg-2 p-0 mb-3">
                        <a href="{{ url('/dashboard/prestasi/produk-inovatif/create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                    </div>

                    @if ($prestasi)
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Judul</b> <a class="float-right">{{ $prestasi->judul }}</a>
                            </li>
                        </ul>    
                        <div class="embed-responsive embed-responsive-16by9 rounded">
                            <iframe class="embed-responsive-item" src="{{ asset($prestasi->file) }}" allowfullscreen></iframe>
                        </div>
                    @else
                        <p>No data found available.</p>
                    @endif
                </div>
                {{-- card body --}}

                @if ($prestasi)    
                    <div class="card-footer">
                        <div class="row p-0">
                            <div class="col-lg-6 mb-3">
                                <a href="{{ url('/dashboard/prestasi/produk-inovatif/'.$prestasi->slug.'/edit') }}" class="btn btn-warning btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <form action="{{ url('/dashboard/prestasi/produk-inovatif/'.$prestasi->slug) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin produk inovatif akan dihapus?')">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        <b>Hapus</b>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- card footer --}}
                @endif
            </div>
        </div>
    </div>
@endsection