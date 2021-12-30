@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <ul class="list-group list-group-unbordered mt-3 mb-3">
                        <li class="list-group-item">
                            <b>Tahun</b> <a class="float-right">{{ $tahun_seleksi->tahun_akademik }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Buka</b> <a class="float-right">{{ $tahun_seleksi->tanggal_buka->format('d-F-Y H:i:s') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Tutup</b> <a class="float-right">{{ $tahun_seleksi->tanggal_tutup->format('d-F-Y H:i:s') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tema Gagasan Kreatif</b> <a class="float-right">{{ $tahun_seleksi->tema_gagasan_kreatif }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tema Produk Inovatif</b> <a class="float-right">{{ $tahun_seleksi->tema_produk_inovatif }}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row p-0">
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/tahun-seleksi') }}" class="btn btn-primary btn-block"><i class="fas fa-arrow-left mr-2"></i><b>Kembali</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/tahun-seleksi/'.$tahun_seleksi->tahun_akademik.'/edit') }}" class="btn btn-warning btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <form action="{{ url('/dashboard/tahun-seleksi/'.$tahun_seleksi->tahun_akademik) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin data akan dihapus?')">
                                    <i class="fas fa-trash-alt mr-2"></i>
                                    <b>Hapus</b>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection