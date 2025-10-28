@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl mt-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Transactions</h2>
        <div>
            <a href="{{ route('transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Borrow Book</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Book</th>
                <th class="p-2 border">Student</th>
                <th class="p-2 border">Borrowed At</th>
                <th class="p-2 border">Due At</th>
                <th class="p-2 border">Returned At</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $t)
            <tr>
                <td class="p-2 border">{{ $t->id }}</td>
                <td class="p-2 border">{{ optional($t->book)->title ?? 'N/A' }}</td>
                <td class="p-2 border">{{ optional($t->student)->first_name ? optional($t->student)->first_name . ' ' . optional($t->student)->last_name : ($t->borrower_name ?? 'N/A') }}</td>
                <td class="p-2 border">{{ $t->borrowed_at ? \Carbon\Carbon::parse($t->borrowed_at)->format('Y-m-d') : 'N/A' }}</td>
                <td class="p-2 border">{{ $t->due_at ? \Carbon\Carbon::parse($t->due_at)->format('Y-m-d') : 'N/A' }}</td>
                <td class="p-2 border">{{ $t->returned_at ? \Carbon\Carbon::parse($t->returned_at)->format('Y-m-d') : '—' }}</td>
                <td class="p-2 border">
                    <a href="{{ route('transactions.show', $t->id) }}" class="text-blue-600 underline">View</a>
                    <a href="{{ route('transactions.edit', $t->id) }}" class="text-yellow-600 underline ml-2">Edit</a>
                    <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 underline ml-2" onclick="return confirm('Delete this transaction?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-2 border text-center">No transactions found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection