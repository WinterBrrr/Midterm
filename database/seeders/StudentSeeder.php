<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'first_name' => 'Earl Roland',
                'last_name' => 'Peralta',
                'enrolled_year' => 2021,
                'department' => 'Information Technology',
                'course' => 'BSIT',
            ],
            [
                'first_name' => 'Eric Brandon',
                'last_name' => 'Gurion',
                'enrolled_year' => 2021,
                'department' => 'Information Technology',
                'course' => 'BSIT',
            ],
            [
                'first_name' => 'Jyian Casey',
                'last_name' => 'Soriano',
                'enrolled_year' => 2021,
                'department' => 'Information Technology',
                'course' => 'BSIT',
            ],
            [
                'first_name' => 'Santiago Elija',
                'last_name' => 'Sabulao',
                'enrolled_year' => 2021,
                'department' => 'Information Technology',
                'course' => 'BSIT',
            ],
            [
                'first_name' => 'Neil Basti',
                'last_name' => 'Benitez',
                'enrolled_year' => 2021,
                'department' => 'Information Technology',
                'course' => 'BSIT',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}