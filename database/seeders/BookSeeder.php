<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            // Classics
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'published_year' => 1925, 'copies_available' => 3],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'published_year' => 1960, 'copies_available' => 5],
            ['title' => 'The Bible', 'author' => 'Various', 'published_year' => 0, 'copies_available' => 10],
            ['title' => 'Encyclopedia Britannica', 'author' => 'Various', 'published_year' => 2010, 'copies_available' => 2],
            ['title' => 'Moby Dick', 'author' => 'Herman Melville', 'published_year' => 1851, 'copies_available' => 2],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'published_year' => 1813, 'copies_available' => 2],
            ['title' => '1984', 'author' => 'George Orwell', 'published_year' => 1949, 'copies_available' => 4],
            ['title' => 'The Odyssey', 'author' => 'Homer', 'published_year' => -800, 'copies_available' => 1],
            ['title' => 'War and Peace', 'author' => 'Leo Tolstoy', 'published_year' => 1869, 'copies_available' => 1],
            ['title' => 'The Catcher in the Rye', 'author' => 'J.D. Salinger', 'published_year' => 1951, 'copies_available' => 3],

            // Harry Potter Series
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author' => 'J.K. Rowling', 'published_year' => 1997, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Chamber of Secrets', 'author' => 'J.K. Rowling', 'published_year' => 1998, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Prisoner of Azkaban', 'author' => 'J.K. Rowling', 'published_year' => 1999, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Goblet of Fire', 'author' => 'J.K. Rowling', 'published_year' => 2000, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Order of the Phoenix', 'author' => 'J.K. Rowling', 'published_year' => 2003, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Half-Blood Prince', 'author' => 'J.K. Rowling', 'published_year' => 2005, 'copies_available' => 4],
            ['title' => 'Harry Potter and the Deathly Hallows', 'author' => 'J.K. Rowling', 'published_year' => 2007, 'copies_available' => 4],

            // Percy Jackson & The Olympians
            ['title' => 'The Lightning Thief', 'author' => 'Rick Riordan', 'published_year' => 2005, 'copies_available' => 3],
            ['title' => 'The Sea of Monsters', 'author' => 'Rick Riordan', 'published_year' => 2006, 'copies_available' => 3],
            ['title' => 'The Titan\'s Curse', 'author' => 'Rick Riordan', 'published_year' => 2007, 'copies_available' => 3],
            ['title' => 'The Battle of the Labyrinth', 'author' => 'Rick Riordan', 'published_year' => 2008, 'copies_available' => 3],
            ['title' => 'The Last Olympian', 'author' => 'Rick Riordan', 'published_year' => 2009, 'copies_available' => 3],

            // Hardy Boys
            ['title' => 'The Tower Treasure', 'author' => 'Franklin W. Dixon', 'published_year' => 1927, 'copies_available' => 2],
            ['title' => 'The House on the Cliff', 'author' => 'Franklin W. Dixon', 'published_year' => 1927, 'copies_available' => 2],

            // Geronimo Stilton
            ['title' => 'Lost Treasure of the Emerald Eye', 'author' => 'Geronimo Stilton', 'published_year' => 2000, 'copies_available' => 2],
            ['title' => 'The Curse of the Cheese Pyramid', 'author' => 'Geronimo Stilton', 'published_year' => 2001, 'copies_available' => 2],

            // Computer Books for College
            ['title' => 'Introduction to Algorithms', 'author' => 'Thomas H. Cormen', 'published_year' => 2009, 'copies_available' => 2],
            ['title' => 'Computer Networking: A Top-Down Approach', 'author' => 'James F. Kurose', 'published_year' => 2012, 'copies_available' => 2],
            ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'published_year' => 2008, 'copies_available' => 2],
            ['title' => 'Artificial Intelligence: A Modern Approach', 'author' => 'Stuart Russell', 'published_year' => 2010, 'copies_available' => 2],
            ['title' => 'Database System Concepts', 'author' => 'Abraham Silberschatz', 'published_year' => 2010, 'copies_available' => 2],
        ];

        foreach ($books as $i => $book) {
            $book['isbn'] = (string)$i; // Set ISBN as incremental string starting from 0
            Book::create($book);
        }
    }
}