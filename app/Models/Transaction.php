<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'student_id', // Add this line
        'borrower_name',
        'borrowed_at',
        'due_at',
        'returned_at',
    ];

    // A transaction belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // A transaction belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}