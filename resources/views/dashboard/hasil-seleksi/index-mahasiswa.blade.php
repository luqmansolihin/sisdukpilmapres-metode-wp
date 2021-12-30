@extends('dashboard.layouts.main')

@section('container')
    @if (!empty($hasils[0]))
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($user->image)
                                <a href="{{ asset('/storage/'.$user->image) }}" data-toggle="lightbox" data-title="{{ $user->mahasiswa->name }}">
                                    <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$user->image) }}" alt="{{ $user->mahasiswa->name }}">                        
                                </a>
                            @else
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/mahasiswa/$2y$10$vok.j0T0Ix0hlqtRQpai5O8E6OZVsSGWWlLwYHbICIuXwdKuCjnG.png') }}" alt="{{ $user->mahasiswa->name }}">
                            @endif
                        </div>
                
                        <h3 class="profile-username text-center">{{ Str::upper($hasils[0]->mahasiswa->name) }}</h3>
                
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nomor Pokok Mahasiswa</b> <a class="float-right">{{ $hasils[0]->mahasiswa->npm }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Program Pendidikan</b> <a class="float-right">{{ $hasils[0]->mahasiswa->program_pendidikan }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Program Studi</b> <a class="float-right">{{ $hasils[0]->mahasiswa->program_studi }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nilai Akhir</b> <a class="float-right">{{ $hasils[0]->vektor_v }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Peringkat</b> <a class="float-right">{{ $hasils[0]->rangking }}</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @else
        <h4>Hasil pemilihan mahasiswa berprestasi saat ini belum dapat ditampilkan.</h4>
        <span>Silahkan cek kembali halaman ini secara berkala.</span>
    @endif
@endsection