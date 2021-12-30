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
            @elseif (session()->has('danger'))
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body my-1">
                        {{ session('danger') }}
                        <button data-dismiss="toast" type="button" class="ml-xl-8 mb-1 close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach ($penilaian_capaian_unggulans as $pcu)    
    <div class="row">        
        <div class="col-lg-8">
            <div class="card card-primary card-outline mb-3">
                <div class="row no-gutters">
                    <div class="col-lg-3 mt-3">
                        <div class="text-center">
                            <a href="{{ asset('/storage/'.$pcu->image) }}" data-toggle="lightbox" data-title="{{ $pcu->name }}">
                                <img class="profile-user-img" src="{{ asset('/storage/'.$pcu->image) }}" alt="{{ $pcu->name }}"> 
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-9">
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nama</b> <a class="float-right">{{ $pcu->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kode</b> <a class="float-right">{{ $pcu->capaian_unggulan->kode }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Bidang</b> <a class="float-right">{{ $pcu->capaian_unggulan->bidang }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Wujud</b> <a class="float-right">{{ $pcu->capaian_unggulan->wujud }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kategori</b> <a class="float-right">{{ $pcu->capaian_unggulan->kategori }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Penerbit</b> <a class="float-right" href="{{ $pcu->penerbit }}" target="blank">{{ $pcu->penerbit }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">{{ $pcu->status }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="row mx-2 mb-3">
                            @if ($pcu->status == "Belum Terverifikasi")
                                <div class="col-lg-6 mb-3">
                                    <form action="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$pcu->slug) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pcu->id }}">
                                        <input type="hidden" name="prestasi_id" value="{{ $pcu->prestasi_id }}">
                                        <input type="hidden" name="status" value="{{ $pcu->status }}">
                                        <input type="hidden" name="skor" value="{{ $pcu->capaian_unggulan->skor }}">
                                        <input type="hidden" name="new_status" value="Valid">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <b>Valid</b>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <form action="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$pcu->slug) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pcu->id }}">
                                        <input type="hidden" name="prestasi_id" value="{{ $pcu->prestasi_id }}">
                                        <input type="hidden" name="status" value="{{ $pcu->status }}">
                                        <input type="hidden" name="skor" value="0">
                                        <input type="hidden" name="new_status" value="Tidak Valid">
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            <b>Tidak Valid</b>
                                        </button>
                                    </form>
                                </div>
                            @elseif ($pcu->status == "Valid")
                                <div class="col-lg-6 mb-3">
                                    <form action="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$pcu->slug) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pcu->id }}">
                                        <input type="hidden" name="prestasi_id" value="{{ $pcu->prestasi_id }}">
                                        <input type="hidden" name="status" value="{{ $pcu->status }}">
                                        <input type="hidden" name="skor" value="{{ $pcu->capaian_unggulan->skor }}">
                                        <input type="hidden" name="new_status" value="Tidak Valid">
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            <b>Tidak Valid</b>
                                        </button>
                                    </form>
                                </div>
                            @elseif ($pcu->status == "Tidak Valid")
                                <div class="col-lg-6 mb-3">
                                    <form action="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan/'.$pcu->slug) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pcu->id }}">
                                        <input type="hidden" name="prestasi_id" value="{{ $pcu->prestasi_id }}">
                                        <input type="hidden" name="status" value="{{ $pcu->status }}">
                                        <input type="hidden" name="skor" value="{{ $pcu->capaian_unggulan->skor }}">
                                        <input type="hidden" name="new_status" value="Valid">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <b>Valid</b>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- row no gutter --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col-lg-8 --}}
    </div>
    {{-- row --}}
    @endforeach
@endsection