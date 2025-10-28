@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Transaction Details</h2>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Book:</strong> {{ $transaction->book->title ?? 'N/A' }}</p>
        <p><strong>Borrower:</strong>
            @if($transaction->student)
                {{ $transaction->student->student_id }} - {{ $transaction->student->first_name }} {{ $transaction->student->last_name }}
            @else
                {{ $transaction->borrower_name }}
            @endif
        </p>
        <p><strong>Borrowed At:</strong> {{ $transaction->borrowed_at }}</p>
        <p><strong>Due At:</strong> {{ $transaction->due_at }}</p>
        <p><strong>Returned At:</strong> {{ $transaction->returned_at ?? '-' }}</p>
    </div>
    <a href="{{ route('transactions.index') }}" class="text-blue-600 underline mt-4 inline-block">Back to List</a>
</div>
@endsection