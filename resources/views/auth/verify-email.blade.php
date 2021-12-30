@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-sm-auto">
            @if (session()->has('message'))
                <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>{{ session('message') }}</strong>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Silahkan Verifikasi Email Anda
                </div>
                <div class="card-body">
                    <p class="card-text my-auto">Sebelum melanjutkan, silahkan periksa email Anda untuk melakukan verifikasi. Jika Anda tidak menerima email,
                        <form class="d-inline" action="{{ url('/email/verification-notification') }}" method="POST">
                            @csrf
                            <button class="btn btn-link p-0 m-0 align-baseline" type="submit">klik disini untuk meminta tautan verifikasi kembali</button>
                        </form>    
                    </p> 
                </div>
            </div>
        </div>
    </div>
@endsection