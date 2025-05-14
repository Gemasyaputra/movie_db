@extends('layout.main')
@section('title', 'Detail Movie')
@section('navMovie', 'active')
@section('container')
    <div class="row-lg-12">
        <div class="card " style="">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $movie['cover_image'] }}" class="img-fluid "
                        style="border-top-left-radius: 10px; border-bottom-left-radius: 10px" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['title'] }}</h5>
                        {{-- <p class="card-text">{{ $movie['synopsis'] }} --}}
                        <p class="card-text">{{ $movie->synopsis }}
                        <p class="card-text">{{ 'actors: ' . $movie->actors }}
                        <p class="card-text">{{ 'category: ' . $movie->category->categori_name }}
                        <p class="card-text">{{ 'year: ' . $movie['year'] }}
                        </p>
                        <a href="/" class="btn btn-success">back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
