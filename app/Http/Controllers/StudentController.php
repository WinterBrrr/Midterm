<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created student in storage
    public function store(\App\Http\Requests\StoreStudentRequest $request)
    {
    Student::create($request->validated());
    return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }   

    // Display the specified student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show the form for editing the specified student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the specified student in storage
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'enrolled_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'department' => 'required|string|max:255',
            'course' => 'required|string|max:255',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Remove the specified student from storage
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}