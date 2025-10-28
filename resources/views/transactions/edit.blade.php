@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Transaction</h2>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium">Book</label>
            @if($transaction->book)
                <input type="text" class="border rounded w-full p-2 bg-gray-100" value="{{ $transaction->book->title }} by {{ $transaction->book->author }}" readonly>
            @else
                <input type="text" class="border rounded w-full p-2 bg-gray-100" value="N/A" readonly>
            @endif
        </div>
        <div>
            <label class="block font-medium">Student</label>
            @if($transaction->student)
                <input type="text" class="border rounded w-full p-2 bg-gray-100"
                    value="{{ $transaction->student->first_name }} {{ $transaction->student->last_name }}" readonly>
            @else
                <input type="text" class="border rounded w-full p-2 bg-gray-100" value="N/A" readonly>
            @endif
        </div>
        <div>
            <label class="block font-medium">Borrowed At</label>
            <input type="date" class="border rounded w-full p-2 bg-gray-100"
                value="{{ $transaction->borrowed_at ? \Carbon\Carbon::parse($transaction->borrowed_at)->format('Y-m-d') : '' }}" readonly>
        </div>
        <div>
            <label class="block font-medium">Due At</label>
            <input type="date" class="border rounded w-full p-2 bg-gray-100"
                value="{{ $transaction->due_at ? \Carbon\Carbon::parse($transaction->due_at)->format('Y-m-d') : '' }}" readonly>
        </div>
        <div>
            <label for="returned_at" class="block font-medium">Returned At</label>
            <input type="date" name="returned_at" id="returned_at" class="border rounded w-full p-2"
                value="{{ old('returned_at', $transaction->returned_at ? \Carbon\Carbon::parse($transaction->returned_at)->format('Y-m-d') : '') }}">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Transaction</button>
        <a href="{{ route('transactions.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection