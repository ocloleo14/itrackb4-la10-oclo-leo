<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private array $authors = [
        'F.H. Batacan',
        'Lualhati Bautista',
        'Jose Rizal',
        'F. Sionil Jose',
        'Miguel Syjuco',
        'Nick Joaquin',
    ];

    public function index(Request $request)
    {
        DB::enableQueryLog();

        $genre = $request->query('genre', 'all');
        $author = $request->query('author', 'all');

        $query = Book::with('genre');

        if ($genre !== 'all') {
            $query->where('genre_id', $genre);
        }

        if ($author !== 'all') {
            $query->where('author', $author);
        }

        $books = $query->get();
        $genres = Genre::all();

        return view('books.index', compact(
            'books',
            'genres',
            'genre',
            'author'
        ));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('books.create', [
            'authors' => $this->authors,
            'genres' => $genres,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|in:' . implode(',', $this->authors),
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|numeric|min:1500|max:2026'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', ['item' => $book]);
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();

        return view('books.edit', [
            'book' => $book,
            'authors' => $this->authors,
            'genres' => $genres,
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|in:' . implode(',', $this->authors),
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|numeric|min:1500|max:2026'
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function featured()
    {
        $item = Book::findOrFail(3);

        return view('books.featured', ['item' => $item]);
    }
}
