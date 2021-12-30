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
                    <h3 class="card-title">Hitung Seleksi</h3>
                </div>
                <!-- /.card-header -->
            
                <div class="card-body">
                    <ol>
                        <li>Atur Bobot Kriteria terlebih dahulu pada menu "Bobot Kriteria".</li>
                        <li>Pada menu ini akan dilakukan perhitungan dari Data Prestasi yang sudah dinilai oleh Juri menggunakan metode <i>Weighted Product (WP)</i>.</li>
                        <li>Klik "Simpan" setelah dilakukan perhitungan.</li>
                        <li>Silahkan lihat hasil perhitungan pada menu "Hasil Seleksi".</li>
                    </ol>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ url('/dashboard/hitung-seleksi/show') }}" class="btn btn-primary">Hitung Seleksi</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection