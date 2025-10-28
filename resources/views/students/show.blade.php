@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Student Details</h2>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
        <p><strong>First Name:</strong> {{ $student->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
        <p><strong>Enrolled Year:</strong> {{ $student->enrolled_year }}</p>
        <p><strong>Department:</strong> {{ $student->department }}</p>
        <p><strong>Course:</strong> {{ $student->course }}</p>
    </div>
    <a href="{{ route('students.index') }}" class="text-blue-600 underline mt-4 inline-block">Back to List</a>
</div>
@endsection