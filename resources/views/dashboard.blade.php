@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-6">Today's Report</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-green-100 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold">{{ $totalBooks }}</div>
            <div class="text-lg mt-2">Current Books</div>
        </div>
        <div class="bg-yellow-100 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold">{{ $totalStudents }}</div>
            <div class="text-lg mt-2">Registered Students</div>
        </div>
        <div class="bg-red-100 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold">{{ $pendingBooks }}</div>
            <div class="text-lg mt-2">Books to be Returned</div>
        </div>
    </div>
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('books.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow">View Books</a>
        <a href="{{ route('students.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow">View Students</a>
        <a href="{{ route('transactions.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow">View Transactions</a>
    </div>
</div>
@endsection