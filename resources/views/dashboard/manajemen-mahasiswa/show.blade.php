@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($mahasiswa->user->image)
                            <a href="{{ asset('/storage/'.$mahasiswa->user->image) }}" data-toggle="lightbox" data-title="{{ $mahasiswa->name }}">
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$mahasiswa->user->image) }}" alt="{{ $mahasiswa->name }}"> 
                            </a>                       
                        @else
                            <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/mahasiswa/$2y$10$vok.j0T0Ix0hlqtRQpai5O8E6OZVsSGWWlLwYHbICIuXwdKuCjnG.png') }}" alt="{{ $mahasiswa->name }}">
                        @endif
                    </div>
            
                    <h3 class="profile-username text-center">{{ Str::upper($mahasiswa->name) }}</h3>
            
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nomor Induk Kependudukan</b> <a class="float-right">{{ $mahasiswa->nik }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tempat, Tanggal Lahir</b> <a class="float-right">{{ $mahasiswa->tempat_lahir.', '.$mahasiswa->tanggal_lahir->format('d F Y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Umur</b> <a class="float-right">{{ $mahasiswa->tanggal_lahir->diff(now())->y .' Tahun '. $mahasiswa->tanggal_lahir->diff(now())->m .' Bulan '. $mahasiswa->tanggal_lahir->diff(now())->d .' Hari' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nomor Pokok Mahasiswa</b> <a class="float-right">{{ $mahasiswa->npm }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telepon</b> <a class="float-right">{{ $mahasiswa->telp }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Program Pendidikan</b> <a class="float-right">{{ $mahasiswa->program_pendidikan }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Program Studi</b> <a class="float-right">{{ $mahasiswa->program_studi }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Semester</b> <a class="float-right">{{ $mahasiswa->semester }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Indeks Prestasi Kumulatif</b> <a class="float-right">{{ $mahasiswa->ipk }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $mahasiswa->user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Status Akun</b> <a class="float-right">{{ $mahasiswa->user->status }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row p-0">
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/manajemen-mahasiswa') }}" class="btn btn-primary btn-block"><i class="fas fa-arrow-left mr-2"></i><b>Kembali</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->npm.'/edit') }}" class="btn btn-warning btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <form action="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->npm) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin mahasiswa akan dihapus?')">
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