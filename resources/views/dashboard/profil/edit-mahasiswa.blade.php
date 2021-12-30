@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <!-- form start -->
                <form action="{{ url('/profil/'.$user->mahasiswa->npm) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="text-center">
                            @if ($user->image)
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/'.$user->image) }}" alt="{{ $user->mahasiswa->name }}">                        
                            @else
                                <img class="profile-user-img img-fluid img-preview" src="{{ asset('/storage/mahasiswa/$2y$10$vok.j0T0Ix0hlqtRQpai5O8E6OZVsSGWWlLwYHbICIuXwdKuCjnG.png') }}" alt="{{ $user->mahasiswa->name }}">
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
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name', $user->mahasiswa->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Kependudukan</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan Nomor Induk Kependudukan" value="{{ old('nik', $user->mahasiswa->nik) }}" required>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $user->mahasiswa->tempat_lahir) }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir', $user->mahasiswa->tanggal_lahir->format('Y-m-d')) }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="npm">Nomor Pokok Mahasiswa</label>
                            <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" id="npm" placeholder="Masukkan Nomor Pokok Mahasiswa" value="{{ old('npm', $user->mahasiswa->npm) }}" required>
                            @error('npm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor Telepon" value="{{ old('telp', $user->mahasiswa->telp) }}" required>
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="program_pendidikan">Program Pendidikan</label>
                            <select name="program_pendidikan" class="form-control @error('program_pendidikan') is-invalid @enderror" id="program_pendidikan" required>
                                <option value="Sarjana" @if (old('program_pendidikan', $user->mahasiswa->program_pendidikan) == 'Sarjana') selected @endif>Sarjana</option>
                                <option value="Diploma" @if (old('program_pendidikan', $user->mahasiswa->program_pendidikan) == 'Diploma') selected @endif>Diploma</option>
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
                                    <option value="{{ $i }}" @if (old('semester', $user->mahasiswa->semester) == $i) selected @endif>{{ $i }}</option>               
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
                            <input type="text" name="ipk" class="form-control @error('ipk') is-invalid @enderror" id="ipk" placeholder="Masukkan Indeks Prestasi Kumulatif" value="{{ old('ipk', $user->mahasiswa->ipk) }}" required>
                            @error('ipk')
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