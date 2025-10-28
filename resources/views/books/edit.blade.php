@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block font-medium">Title</label>
            <input type="text" name="title" id="title" class="border rounded w-full p-2" value="{{ old('title', $book->title) }}" required>
        </div>
        <div>
            <label for="author" class="block font-medium">Author</label>
            <input type="text" name="author" id="author" class="border rounded w-full p-2" value="{{ old('author', $book->author) }}" required>
        </div>
        <div>
            <label for="isbn" class="block font-medium">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="border rounded w-full p-2" value="{{ old('isbn', $book->isbn) }}" required>
        </div>
        <div>
            <label for="published_year" class="block font-medium">Published Year</label>
            <input type="number" name="published_year" id="published_year" class="border rounded w-full p-2" value="{{ old('published_year', $book->published_year) }}">
        </div>
        <div>
            <label for="copies_available" class="block font-medium">Copies Available</label>
            <input type="number" name="copies_available" id="copies_available" class="border rounded w-full p-2" min="1" value="{{ old('copies_available', $book->copies_available) }}" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Book</button>
        <a href="{{ route('books.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection