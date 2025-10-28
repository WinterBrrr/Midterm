<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Book;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $books = Book::all();

        $borrowers = [
            'Earl Roland Peralta',
            'Eric Brandon Gurion',
            'Jyian Casey Soriano',
            'Santiago Elija Sabulao',
            'Neil Basti Benitez',
        ];

        foreach (range(1, 20) as $i) {
            $book = $books->random();
            $borrowedAt = Carbon::now()->subDays(rand(1, 30));
            $dueAt = (clone $borrowedAt)->addDays(14);
            $returnedAt = rand(0, 1) ? (clone $borrowedAt)->addDays(rand(1, 20)) : null;

            Transaction::create([
                'book_id' => $book->id,
                'borrower_name' => $borrowers[array_rand($borrowers)],
                'borrowed_at' => $borrowedAt,
                'due_at' => $dueAt,
                'returned_at' => $returnedAt,
            ]);
        }
    }
}