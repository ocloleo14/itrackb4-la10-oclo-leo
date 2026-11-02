
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="card-title mb-4">Add Book</h2>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        value="{{ old('title') }}"
                    >

                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>

                    <select name="author" id="author" class="form-control">
                        <option value="">Select Author</option>
                        @foreach ($authors as $name)
                            <option value="{{ $name }}" @selected(old('author') === $name)>{{ $name }}</option>
                        @endforeach
                    </select>

                    @error('author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>

                    <select name="genre_id" id="genre_id" class="form-control">
                        <option value="">Select Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>{{ $genre->name }}</option>
                        @endforeach
                    </select>

                    @error('genre_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>

                    <input
                        type="number"
                        name="year"
                        id="year"
                        class="form-control"
                        value="{{ old('year') }}"
                    >

                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Book</button>

                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>
    </div>

@endsection
