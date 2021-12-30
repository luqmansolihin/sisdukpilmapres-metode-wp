@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <!-- form start -->
                <form action="{{ url('/dashboard/manajemen-dosen/'.$dosen->nip) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $dosen->id }}">
                    <div class="card-body">
                        <div class="text-center">
                            @if ($dosen->user->image)
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$dosen->user->image) }}" alt="{{ $dosen->name }}">                        
                            @else
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/dosen/$2y$10$Rx.mP8NOTPu3djSoK4sdSOUKAVEpGCoBz5cnq9KPvZb3Az6CU0Za2.png') }}" alt="{{ $dosen->name }}">
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
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name', $dosen->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Identitas Pegawai</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukkan Nomor Identitas Pegawai" value="{{ old('nip', $dosen->nip) }}" required>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ old('email', $dosen->user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role Akun</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option selected disabled>Pilih Role Akun</option>
                                <option value="dosen" @if (old('role', $dosen->user->role) == 'dosen') selected @endif>Dosen</option>
                                <option value="juri" @if (old('role', $dosen->user->role) == 'juri') selected @endif>Juri</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status Akun</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option selected disabled>Pilih Status Akun</option>
                                <option value="aktif" @if (old('status', $dosen->user->status) == 'aktif') selected @endif>Aktif</option>
                                <option value="non-aktif" @if (old('status', $dosen->user->status) == 'non-aktif') selected @endif>Non-Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Masukkan Konfirmasi Password" required>
                            @error('password_confirmation')
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