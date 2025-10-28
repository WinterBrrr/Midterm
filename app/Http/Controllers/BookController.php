<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a listing of books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show the form for creating a new book
    public function create()
    {
        return view('books.create');
    }

    // Store a newly created book in storage
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255|unique:books,title',
        'author' => 'required|string|max:255',
        'isbn' => 'required|string|unique:books,isbn',
        'published_year' => 'nullable|integer',
        'copies_available' => 'required|integer|min:1',
    ]);

    Book::create($request->all());
    return redirect()->route('books.index')->with('success', 'Book added successfully.');
}

    // Display the specified book
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Show the form for editing the specified book
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update the specified book in storage
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'published_year' => 'nullable|integer',
            'copies_available' => 'required|integer|min:1',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Remove the specified book from storage
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}