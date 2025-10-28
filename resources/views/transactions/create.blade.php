@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Borrow Book</h2>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="book_id" class="block font-medium">Book</label>
            <select name="book_id" id="book_id" class="border rounded w-full p-2" required>
                <option value="">Select a book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} by {{ $book->author }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="student_id" class="block font-medium">Student</label>
            <select name="student_id" id="student_id" class="border rounded w-full p-2" required>
                <option value="">Select a student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="borrowed_at" class="block font-medium">Borrowed At</label>
            <input type="date" name="borrowed_at" id="borrowed_at" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label for="due_at" class="block font-medium">Due At</label>
            <input type="date" name="due_at" id="due_at" class="border rounded w-full p-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Borrow</button>
        <a href="{{ route('transactions.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection