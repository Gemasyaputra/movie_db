@extends('layout.main')
@section('title','Form input movie')
@section('navInput','active')
    @section('container')

        <form action="/movie/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-label">Synopsis</label>
                <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year">
            </div>
            <div class="mb-3">
                <label for="actors" class="form-label">Actors</label>
                <input type="text" class="form-control" id="actors" name="actors">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categori_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mb-3" >Submit</button>
            
        </form >
    @endsection