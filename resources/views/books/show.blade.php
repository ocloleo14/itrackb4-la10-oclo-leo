@extends('layouts.app')

@section('title', $item['title'])

@section('content')

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="card-title mb-4">
                {{ $item['title'] }}
            </h2>

            <p>
                <strong>ID:</strong>
                {{ $item['id'] }}
            </p>

            <p>
                <strong>Title:</strong>
                {{ $item['title'] }}
            </p>

            <p>
                <strong>Author:</strong>
                {{ $item['author'] }}
            </p>

            <p>
                <strong>Genre:</strong>
               {{ $item->genre->name }}
            </p>

            <p>
                <strong>Year:</strong>
                {{ $item['year'] }}
            </p>

            <a href="{{ route('books.index') }}" class="btn btn-primary">
                Back to Book List
            </a>

        </div>

    </div>

@endsection