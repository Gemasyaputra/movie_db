@extends('layout.main')

@section('title', 'Form input movie')
@section('navInput', 'active')

@section('container')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Form Update Movie</h1>
                <form method="post" action="/movie/{{ $movie->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $movie->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                @if (old('category_id', $movie->category_id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->categori_name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->categori_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                            name="year" value="{{ old('year', $movie->year) }}">
                        @error('year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="actors" class="form-label">Actors</label>
                        <input type="text" class="form-control @error('actors') is-invalid @enderror" id="actors"
                            name="actors" value="{{ old('actors', $movie->actors) }}">
                        @error('actors')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control @error('synopsis') is-invalid @enderror" rows="10" id="synopsis" name="synopsis">{{ old('synopsis', $movie->synopsis) }}</textarea>
                        @error('synopsis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <div class="row">
                            <div class="col-sm-5">
                                @if (Str::startsWith($movie->cover_image, ['http://', 'https://']))
                                    <img src="{{ $movie->cover_image }}"
                                        class="img-preview img-fluid mb-3 {{ $movie->cover_image ? '' : 'd-none' }}"
                                        style="max-width: 200px; max-height: 200px;">
                                @else
                                    <img src="{{ asset('storage/' . $movie->cover_image) }}"
                                        class="img-preview img-fluid mb-3 {{ $movie->cover_image ? '' : 'd-none' }}"
                                        style="max-width: 200px; max-height: 200px;">
                                @endif
                            </div>
                            <div class="col-sm-7">
                                <input class="form-control @error('cover_image') is-invalid @enderror" type="file"
                                    id="cover_image" name="cover_image" onchange="previewImage()">
                                @error('cover_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-3">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
    const image = document.querySelector('#cover_image');
    const imgPreview = document.querySelector('.img-preview');

    const file = image.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

    </script>

@endsection
