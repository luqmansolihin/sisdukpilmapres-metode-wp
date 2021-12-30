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
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($user->image)
                            <a href="{{ asset('/storage/'.$user->image) }}" data-toggle="lightbox" data-title="{{ $user->dosen->name }}">
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$user->image) }}" alt="{{ $user->dosen->name }}">
                            </a>                        
                        @else
                            <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/dosen/$2y$10$Rx.mP8NOTPu3djSoK4sdSOUKAVEpGCoBz5cnq9KPvZb3Az6CU0Za2.png') }}" alt="{{ $user->dosen->name }}">
                        @endif
                    </div>
            
                    <h3 class="profile-username text-center">{{ Str::upper($user->dosen->name) }}</h3>
            
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nomor Identitas Pegawai</b> <a class="float-right">{{ $user->dosen->nip }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ url('/profil/'. auth()->user()->dosen->nip.'/edit') }}" class="btn btn-primary"><i class="fas fa-user-edit mr-2"></i><b>Edit Profil</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection