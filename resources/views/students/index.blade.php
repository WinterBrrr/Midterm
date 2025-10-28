@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl mt-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Students List</h2>
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Register New Student</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Student ID</th>
                <th class="p-2 border">First Name</th>
                <th class="p-2 border">Last Name</th>
                <th class="p-2 border">Enrolled Year</th>
                <th class="p-2 border">Department</th>
                <th class="p-2 border">Course</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td class="p-2 border">{{ $student->student_id }}</td>
                <td class="p-2 border">{{ $student->first_name }}</td>
                <td class="p-2 border">{{ $student->last_name }}</td>
                <td class="p-2 border">{{ $student->enrolled_year }}</td>
                <td class="p-2 border">{{ $student->department }}</td>
                <td class="p-2 border">{{ $student->course }}</td>
                <td class="p-2 border">
                    <a href="{{ route('students.show', $student->id) }}" class="text-blue-600 underline">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="text-yellow-600 underline ml-2">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 underline ml-2" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-2 border text-center">No students found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection