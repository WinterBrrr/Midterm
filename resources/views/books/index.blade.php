@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl mt-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Books List</h2>
        <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add New Book</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Author</th>
                <th class="p-2 border">ISBN</th>
                <th class="p-2 border">Published Year</th>
                <th class="p-2 border">Copies Available</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td class="p-2 border">{{ $book->title }}</td>
                <td class="p-2 border">{{ $book->author }}</td>
                <td class="p-2 border">{{ $book->isbn }}</td>
                <td class="p-2 border">
                    @if($book->published_year < 0)
                        {{ abs($book->published_year) }} B.C.
                    @else
                        {{ $book->published_year }}
                    @endif
                </td>
                <td class="p-2 border">{{ $book->copies_available }}</td>
                <td class="p-2 border">
                    <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 underline">View</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="text-yellow-600 underline ml-2">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 underline ml-2" onclick="return confirm('Delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-2 border text-center">No books found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection