<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'published_year',
        'copies_available',
    ];

    // A book has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}