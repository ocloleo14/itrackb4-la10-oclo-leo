
@extends('layouts.app')

@section('title', 'Book Collection')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>My Book Collection</h2>
            <p class="text-muted">
                Browse the books in the collection.
            </p>
        </div>

        <div>
            <a href="{{ route('books.create') }}" class="btn btn-success">
                Add Book
            </a>

            <a href="{{ route('books.featured') }}" class="btn btn-primary">
                View Featured Book
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="card-title mb-3">All Books</h3>

            <p>
                <strong>Genre:</strong>
                {{ $genre === 'all' ? 'all' : ($genres->firstWhere('id', $genre)?->name ?? 'all') }}
                |
                <strong>Author:</strong> {{ $author }}
            </p>

            <h5>Filter by Genre</h5>

            @foreach ($genres as $genreItem)
                @if ($author === 'all')
                    <a href="{{ route('books.index', ['genre' => $genreItem->id]) }}">
                        {{ $genreItem->name }}
                    </a>
                @else
                    <a href="{{ route('books.index', ['genre' => $genreItem->id, 'author' => $author]) }}">
                        {{ $genreItem->name }}
                    </a>
                @endif
            @endforeach

            <br><br>

            <h5>Filter by Author</h5>

            @php
                $authors = [
                    'F.H. Batacan',
                    'Lualhati Bautista',
                    'Jose Rizal',
                    'F. Sionil Jose',
                    'Miguel Syjuco',
                    'Nick Joaquin',
                ];
            @endphp

            @foreach ($authors as $authorName)
                @if ($genre === 'all')
                    <a href="{{ route('books.index', ['author' => $authorName]) }}">
                        {{ $authorName }}
                    </a>
                @else
                    <a href="{{ route('books.index', ['genre' => $genre, 'author' => $authorName]) }}">
                        {{ $authorName }}
                    </a>
                @endif
            @endforeach

            <p class="mt-3">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    Clear Both Filters
                </a>
            </p>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($books as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <a href="{{ route('books.show', $item['id']) }}">
                                    {{ $item['title'] }}
                                </a>
                            </td>

                            <td>{{ $item['author'] }}</td>

                            <td>{{ $item->genre->name }}</td>

                            <td>{{ $item['year'] }}</td>

                            <td>
                                @if ($item['year'] < 2000)
                                    <span class="badge bg-secondary">
                                        Classic
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Modern
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                No books are available in the collection right now.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

    <p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>

@endsection
