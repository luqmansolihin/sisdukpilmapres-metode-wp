@extends('dashboard.layouts.main')

@section('container')
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
                                    <b>Penerbit</b> <a href="{{ $pcu->penerbit }}" target="blank" class="float-right">{{ $pcu->penerbit }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">{{ $pcu->status }}</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="row mx-2 mb-3">
                            <div class="col-lg-4 mb-3">
                                <a href="{{ url('/dashboard/prestasi/capaian-unggulan/') }}" class="btn btn-primary btn-block"><i class="fas fa-arrow-left mr-2"></i><b>Kembali</b></a>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <a href="{{ url('/dashboard/prestasi/capaian-unggulan/'.$pcu->slug.'/edit') }}" class="btn btn-warning btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <form action="{{ url('/dashboard/prestasi/capaian-unggulan/'.$pcu->slug) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin prestasi capaian unggulan akan dihapus?')">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        <b>Hapus</b>
                                    </button>
                                </form>
                            </div>
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
@endsection