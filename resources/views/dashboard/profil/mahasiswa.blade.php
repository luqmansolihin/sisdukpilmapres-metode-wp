@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
    <div class="toasts-top-right fixed">
        <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body my-1">
                {{ session('success') }}
                <button data-dismiss="toast" type="button" class="ml-xl-5 mb-1 close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    
    <div class="row">
        <div class="col-lg-7">
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
            
                    <h3 class="profile-username text-center">{{ Str::upper($user->mahasiswa->name) }}</h3>
            
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nomor Induk Kependudukan</b> <a class="float-right">{{ $user->mahasiswa->nik }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat, Tanggal Lahir</b> <a class="float-right">{{ $user->mahasiswa->tempat_lahir.', '.$user->mahasiswa->tanggal_lahir->format('d F Y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Umur</b> <a class="float-right">{{ $user->mahasiswa->tanggal_lahir->diff(now())->y .' Tahun '. $user->mahasiswa->tanggal_lahir->diff(now())->m .' Bulan '. $user->mahasiswa->tanggal_lahir->diff(now())->d .' Hari' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nomor Pokok Mahasiswa</b> <a class="float-right">{{ $user->mahasiswa->npm }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telepon</b> <a class="float-right">{{ $user->mahasiswa->telp }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Program Pendidikan</b> <a class="float-right">{{ $user->mahasiswa->program_pendidikan }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Program Studi</b> <a class="float-right">{{ $user->mahasiswa->program_studi }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Semester</b> <a class="float-right">{{ $user->mahasiswa->semester }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Indeks Prestasi Kumulatif</b> <a class="float-right">{{ $user->mahasiswa->ipk }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row p-0">
                        <a href="{{ url('/profil/'.$user->mahasiswa->npm.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit mr-2"></i><b>Edit Profil</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection