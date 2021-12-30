@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <!-- form start -->
                <form action="{{ url('/dashboard/manajemen-mahasiswa/'.$mahasiswa->npm) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                    <div class="card-body">
                        <div class="text-center">
                            @if ($mahasiswa->user->image)
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$mahasiswa->user->image) }}" alt="{{ $mahasiswa->name }}">                        
                            @else
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/mahasiswa/$2y$10$vok.j0T0Ix0hlqtRQpai5O8E6OZVsSGWWlLwYHbICIuXwdKuCjnG.png') }}" alt="{{ $mahasiswa->name }}">
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
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name', $mahasiswa->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Kependudukan</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan Nomor Induk Kependudukan" value="{{ old('nik', $mahasiswa->nik) }}" required>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir->format('Y-m-d')) }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="npm">Nomor Pokok Mahasiswa</label>
                            <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" id="npm" placeholder="Masukkan Nomor Pokok Mahasiswa" value="{{ old('npm', $mahasiswa->npm) }}" required>
                            @error('npm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor Telepon" value="{{ old('telp', $mahasiswa->telp) }}" required>
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="program_pendidikan">Program Pendidikan</label>
                            <select name="program_pendidikan" class="form-control @error('program_pendidikan') is-invalid @enderror" id="program_pendidikan" required>
                                <option value="Sarjana" @if (old('program_pendidikan', $mahasiswa->program_pendidikan) == 'Sarjana') selected @endif>Sarjana</option>
                                <option value="Diploma" @if (old('program_pendidikan', $mahasiswa->program_pendidikan) == 'Diploma') selected @endif>Diploma</option>
                            </select>
                            @error('program_pendidikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            <select name="program_studi" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" required></select>
                            @error('program_studi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="semester" required>
                                @for ($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" @if (old('semester', $mahasiswa->semester) == $i) selected @endif>{{ $i }}</option>               
                                @endfor
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ipk">Indeks Prestasi Kumulatif</label>
                            <input type="text" name="ipk" class="form-control @error('ipk') is-invalid @enderror" id="ipk" placeholder="Masukkan Indeks Prestasi Kumulatif" value="{{ old('ipk', $mahasiswa->ipk) }}" required>
                            @error('ipk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ old('email', $mahasiswa->user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status Akun</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option selected disabled>Pilih Status Akun</option>
                                <option value="aktif" @if (old('status', $mahasiswa->user->status) == 'aktif') selected @endif>Aktif</option>
                                <option value="non-aktif" @if (old('status', $mahasiswa->user->status) == 'non-aktif') selected @endif>Non-Aktif</option>
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