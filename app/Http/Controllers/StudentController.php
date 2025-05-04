<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('course')->latest();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('id', $request->search);
            });
        }

        if ($request->filled('course')) {
            $query->where('course_id', (int)$request->course);
        }

        if ($request->filled('year_level')) {
            $query->where('year_level', (int)$request->year_level);
        }

        $students = $query->paginate(10);
        $courses = Course::all();

        return view('students.index', [
            'students' => $students,
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', [
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'age' => ['required', 'min:1'],
            'gender' => ['required'],
            'course_id' => ['required', 'exists:courses,id'],
            'year_level' => ['required']
        ]);

        Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'course_id' => $request->course_id,
            'year_level' => $request->year_level
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        $student = Student::with('course')->findOrFail($id);

        return view('students.show', [
            'student' => $student
        ]);
    }

    public function edit($id)
    {
        $student = Student::with('course')->findOrFail($id);
        $courses = Course::all();

        return view('students.edit', [
            'student' => $student,
            'courses' => $courses
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'age' => ['required', 'min:1'],
            'gender' => ['required'],
            'course_id' => ['required', 'exists:courses,id'],
            'year_level' => ['required']
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'course_id' => $request->course_id,
            'year_level' => $request->year_level
        ]);

        return redirect('/students/' . $student->id)
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/');
    }
}
