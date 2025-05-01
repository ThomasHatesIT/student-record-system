@extends('layouts.app') {{-- Make sure you have a layout; or remove this line if you're not using one --}}

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4">Student Details</h2>

    <div class="mb-3">
        <strong>Name:</strong> {{ $student->name }}
    </div>

    <div class="mb-3">
        <strong>Age:</strong> {{ $student->age }}
    </div>

    <div class="mb-3">
        <strong>Gender:</strong> {{ ucfirst($student->gender) }}
    </div>

    <div class="mb-3">
        <strong>Course:</strong> {{ $student->course->name ?? 'N/A' }}
    </div>

    <div class="mb-3">
        <strong>Year Level:</strong> {{ $student->year_level }}
    </div>

    <a href="/" class="inline-block mt-4 text-blue-500 hover:underline">← Back to Students List</a>
</div>
@endsection
