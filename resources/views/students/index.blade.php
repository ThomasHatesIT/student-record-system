@extends('layouts.app')

@section('title', 'All Students')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Students List</h1>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-sm">
            + Add New Student
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Course</th>
                    <th class="px-4 py-3 text-left">Year Level</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                @foreach($students as $student)
                    <tr>
                        <td class="px-4 py-2">{{ $student->id }}</td>
                        <td class="px-4 py-2">{{ $student->name }}</td>
                        <td class="px-4 py-2">{{ $student->course->name }}</td>
                        <td class="px-4 py-2">{{ $student->year_level }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="#" class="text-blue-500 hover:underline">View</a>
                            <a href="#" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $students->links() }}
    </div>
@endsection
