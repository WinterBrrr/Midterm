@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl mt-8">
    <h2 class="text-2xl font-bold mb-4">Return Books</h2>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Book</th>
                <th class="p-2 border">Borrower</th>
                <th class="p-2 border">Borrowed At</th>
                <th class="p-2 border">Due At</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr>
                <td class="p-2 border">{{ $transaction->book->title ?? 'N/A' }}</td>
                <td class="p-2 border">
                    @if($transaction->student)
                        {{ $transaction->student->student_id }} - {{ $transaction->student->first_name }} {{ $transaction->student->last_name }}
                    @else
                        {{ $transaction->borrower_name }}
                    @endif
                </td>
                <td class="p-2 border">{{ $transaction->borrowed_at }}</td>
                <td class="p-2 border">{{ $transaction->due_at }}</td>
                <td class="p-2 border">
                    <form action="{{ route('transactions.markReturned', $transaction->id) }}" method="POST" onsubmit="return confirm('Mark this book as returned?');">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Return</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-2 border text-center">No books to return.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('transactions.index') }}" class="text-blue-600 underline mt-4 inline-block">Back to Transactions</a>
</div>
@endsection