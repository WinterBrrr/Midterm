<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StudentController;

// Dashboard/Home page
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Resource routes for books
Route::resource('books', BookController::class);

// Resource routes for transactions
Route::resource('transactions', TransactionController::class);

// Additional routes for Return Book workflow
Route::get('transactions/return', [TransactionController::class, 'returnList'])->name('transactions.return');
Route::post('transactions/return/{transaction}', [TransactionController::class, 'markReturned'])->name('transactions.markReturned');

// Resource routes for students
Route::resource('students', StudentController::class);