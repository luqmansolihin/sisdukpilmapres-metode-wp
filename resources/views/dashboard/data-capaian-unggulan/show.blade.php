@extends('dashboard.layouts.main')

@section('container')
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