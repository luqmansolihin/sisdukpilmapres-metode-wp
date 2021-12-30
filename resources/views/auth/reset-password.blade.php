@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-lg-auto">
            @if (session()->has('status'))
                <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>{{ session('status') }}</strong>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session()->has('email'))
                <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>{{ session('email') }}</strong>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-reset">
                <img class="d-block img-fluid mb-4 mx-auto" src="{{ asset('/img/untidar.png') }}" alt="UNIVERSITAS TIDAR" width="80">
                <h1 class="h5 mb-4 fw-normal text-center"><b>SISDUKPILMAPRES</b></h1>
                <form class="mb-2" action="{{ url('/reset-password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-top" id="email" placeholder="Email" value="{{ old('email', $email) }}" required>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Baru" required autocomplete="new-password">
                        <label for="password">Password Baru</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password_confirmation" class="form-control rounded-bottom" id="password" placeholder="Konfirmasi Password" required autocomplete="new-password">
                        <label for="password">Konfirmasi Password</label>
                    </div>            
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Reset Password</button>
                </form>
            </main>
        </div>
    </div>
@endsection