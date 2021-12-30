@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Prestasi Produk Inovatif</h3>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Judul</b> <a class="float-right">{{ $prestasi->judul }}</a>
                        </li>
                    </ul>    
                    <div class="embed-responsive embed-responsive-16by9 rounded mb-3">
                        <iframe class="embed-responsive-item" src="{{ asset($prestasi->file) }}" allowfullscreen></iframe>
                    </div>
                </div>
                {{-- card body --}}
            </div>
        </div>
    </div>
@endsection