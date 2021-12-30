@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-register">
                <img class="d-block img-fluid mb-4 mx-auto" src="{{ asset('/img/untidar.png') }}" alt="UNIVERSITAS TIDAR" width="80">
                <h1 class="h5 mb-4 fw-normal text-center"><b>Form Pendaftaran Akun Mahasiswa</b></h1>
                <form class="mb-2" action="{{ url('/register-mahasiswa') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="mahasiswa">
                    <input type="hidden" name="status" value="aktif">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" value="{{ old('nik') }}" required>
                        <label for="nik">Nomor Induk Kependudukan</label>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" id="npm" placeholder="NPM" value="{{ old('npm') }}" required>
                        <label for="npm">Nomor Pokok Mahasiswa</label>
                        @error('npm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Telepon" value="{{ old('telp') }}" required>
                        <label for="telp">Telepon</label>
                        @error('telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select name="program_pendidikan" class="form-control @error('program_pendidikan') is-invalid @enderror" id="program_pendidikan" required>
                            <option selected disabled hidden>Program Pendidikan</option>
                            <option value="Sarjana" @if (old('program_pendidikan') == 'Sarjana') selected @endif>Sarjana</option>
                            <option value="Diploma" @if (old('program_pendidikan') == 'Diploma') selected @endif>Diploma</option>
                        </select>
                        <label for="program_pendidikan">Program Pendidikan</label>
                        @error('program_pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select name="program_studi" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" required>
                            <option hidden>Program Studi</option>
                        </select>
                        <label for="program_studi">Program Studi</label>
                        @error('program_studi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="semester" required>
                            <option selected disabled hidden>Semester</option>
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}" @if (old('semester') == $i) selected @endif>{{ $i }}</option>               
                            @endfor
                        </select>
                        <label for="semester">Semester</label>
                        @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="ipk" class="form-control @error('ipk') is-invalid @enderror" id="ipk" placeholder="IPK" value="{{ old('ipk') }}" required>
                        <label for="ipk">Indeks Prestasi Kumulatif</label>
                        @error('ipk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password_confirmation" class="form-control rounded-bottom @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>            
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
                </form>
            </main>
        </div>
    </div>
@endsection