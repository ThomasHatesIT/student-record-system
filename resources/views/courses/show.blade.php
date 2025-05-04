@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Course Details</h1>
            <p class="text-sm text-gray-500 mt-1">View information about this course.</p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 space-y-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Course ID</h2>
                <p class="text-gray-900">{{ $course->id }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-700">Course Name</h2>
                <p class="text-gray-900">{{ $course->name }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                <p class="text-gray-900">{{ $course->description }}</p>
            </div>

            <div class="flex space-x-4 pt-4">
                <a href="/courses" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium">Back</a>
                <a href="/courses/{{ $course->id }}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium">Edit</a>
                <form action="/courses/{{ $course->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
