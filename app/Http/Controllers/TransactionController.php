<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['book', 'student'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $books = Book::all();
        $students = Student::all();
        return view('transactions.create', compact('books', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:students,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
        ]);

        $student = Student::find($request->student_id);

        Transaction::create([
            'book_id' => $request->book_id,
            'student_id' => $request->student_id,
            'borrower_name' => $student ? $student->first_name . ' ' . $student->last_name : null,
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created!');
    }

    public function edit($id)
    {
        $transaction = Transaction::with(['book', 'student'])->findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $request->validate([
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        $transaction->update([
            'returned_at' => $request->returned_at,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated!');
    }

    // Show a single transaction
    public function show($id)
    {
        $transaction = Transaction::with(['book', 'student'])->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted');
    }

    // List transactions that are not yet returned
    public function returnList()
    {
        $transactions = Transaction::with(['book', 'student'])->whereNull('returned_at')->get();
        return view('transactions.return', compact('transactions'));
    }

    // Mark a transaction as returned
    public function markReturned($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->returned_at = Carbon::now();
        $transaction->save();

        return redirect()->route('transactions.return')->with('success', 'Book marked as returned.');
    }
}