@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($dosen->user->image)
                            <a href="{{ asset('/storage/'.$dosen->user->image) }}" data-toggle="lightbox" data-title="{{ $dosen->name }}">
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$dosen->user->image) }}" alt="{{ $dosen->name }}">  
                            </a>                      
                        @else
                            <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/dosen/$2y$10$Rx.mP8NOTPu3djSoK4sdSOUKAVEpGCoBz5cnq9KPvZb3Az6CU0Za2.png') }}" alt="{{ $dosen->name }}">
                        @endif
                    </div>
            
                    <h3 class="profile-username text-center">{{ Str::upper($dosen->name) }}</h3>
            
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nomor Identitas Pegawai</b> <a class="float-right">{{ $dosen->nip }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $dosen->user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Role Akun</b> <a class="float-right">{{ $dosen->user->role }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Status Akun</b> <a class="float-right">{{ $dosen->user->status }}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row p-0">
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/manajemen-dosen') }}" class="btn btn-primary btn-block"><i class="fas fa-arrow-left mr-2"></i><b>Kembali</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <a href="{{ url('/dashboard/manajemen-dosen/'.$dosen->nip.'/edit') }}" class="btn btn-warning btn-block"><i class="fas fa-edit mr-2"></i><b>Edit</b></a>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <form action="{{ url('/dashboard/manajemen-dosen/'.$dosen->nip) }}" method="POST">
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