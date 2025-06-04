@extends('layout.main')
@section('title', 'List Movie')
@section('navMovie', 'active')
@section('container')
    <h1>List Movie</h1>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Year</th>
                <th scope="col">Actors</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->category->categori_name }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ $movie->actors }}</td>
                <td>
                    
                    <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success">Detail</a>
                    @if (Auth::user()->role == 'admin')
                    <a href="/movies/{{ $movie->id }}/edit" class="btn btn-warning">Edit</a>    
                    @endif
                    @can('delete-movie')
                        
                    
                    <form action="/movie/{{ $movie->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus film ini?')">Delete</button>

                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
    {{ $movies->links('pagination::bootstrap-5') }}
  </div>

@endsection
