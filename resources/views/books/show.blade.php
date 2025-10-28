@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Book Details</h2>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Title:</strong> {{ $book->title }}</p>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Published Year:</strong>
            @if($book->published_year < 0)
                {{ abs($book->published_year) }} B.C.
             @else
                {{ $book->published_year }}
            @endif
        </p>
        <p><strong>Copies Available:</strong> {{ $book->copies_available }}</p>
    </div>
    <a href="{{ route('books.index') }}" class="text-blue-600 underline mt-4 inline-block">Back to List</a>
</div>
@endsection