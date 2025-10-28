<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'enrolled_year',
        'department',
        'course',
    ];

    protected static function booted()
    {
        static::creating(function ($student) {
            $year = substr($student->enrolled_year, -2); // last 2 digits of year
            $base = $year . '100012';

            // Get the last student for this year
            $lastStudent = self::where('enrolled_year', $student->enrolled_year)
                ->orderByDesc('student_id')
                ->first();

            if ($lastStudent) {
                // Increment last student_id by 10
                $student->student_id = (string)((int)$lastStudent->student_id + 10);
            } else {
                // First student for this year
                $student->student_id = $base;
            }
        });
    }
}