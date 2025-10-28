@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mx-auto max-w-md mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="first_name" class="block font-medium">First Name</label>
            <input type="text" name="first_name" id="first_name" class="border rounded w-full p-2" value="{{ old('first_name', $student->first_name) }}" required>
        </div>
        <div>
            <label for="last_name" class="block font-medium">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="border rounded w-full p-2" value="{{ old('last_name', $student->last_name) }}" required>
        </div>
        <div>
            <label for="enrolled_year" class="block font-medium">Enrolled Year</label>
            <input type="number" name="enrolled_year" id="enrolled_year" class="border rounded w-full p-2" min="1900" max="{{ date('Y') }}" value="{{ old('enrolled_year', $student->enrolled_year) }}" required>
        </div>
        <div>
            <label for="department" class="block font-medium">Department</label>
            <input type="text" name="department" id="department" class="border rounded w-full p-2" value="{{ old('department', $student->department) }}" required>
        </div>
        <div>
            <label for="course" class="block font-medium">Course</label>
            <input type="text" name="course" id="course" class="border rounded w-full p-2" value="{{ old('course', $student->course) }}" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Student</button>
        <a href="{{ route('students.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection