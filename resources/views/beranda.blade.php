@extends('layouts.main')

@section('container')
    <div id="myCarousel" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="{{ asset('/storage/slider/Slide-1.png') }}" class="d-block w-100 img-fluid" alt="Slide 1">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="{{ asset('/storage/slider/Slide-2.png') }}" class="d-block w-100 img-fluid" alt="Slide 2">
            </div>
        </div>
    </div>
@endsection