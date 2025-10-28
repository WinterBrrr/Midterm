<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalStudents = Student::count();
        $pendingBooks = Transaction::whereNull('returned_at')->count();

        return view('dashboard', compact('totalBooks', 'totalStudents', 'pendingBooks'));
    }
}