@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <!-- form start -->
                <form action="{{ url('/profil/'.$user->dosen->nip) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="text-center">
                            @if ($user->image)
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$user->image) }}" alt="{{ $user->dosen->name }}">                        
                            @else
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/dosen/$2y$10$Rx.mP8NOTPu3djSoK4sdSOUKAVEpGCoBz5cnq9KPvZb3Az6CU0Za2.png') }}" alt="{{ $user->dosen->name }}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Foto Profil</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" onchange="previewImage()">
                                <label class="custom-file-label" for="image">Foto Profil (Optional)</label>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name', $user->dosen->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Identitas Pegawai</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukkan Nomor Identitas Pegawai" value="{{ old('nip', $user->dosen->nip) }}" required>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i><b>Simpan</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection