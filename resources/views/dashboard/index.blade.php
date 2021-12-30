@extends('dashboard.layouts.main')

@section('container')
    <p>
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen' || auth()->user()->role == 'juri' )
            Welcome, {{ $user->dosen->name }}
        @else        
            Welcome, {{ $user->mahasiswa->name }}
        @endif
    </p>
@endsection