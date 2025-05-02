<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;

Route::get('/',function (Request $request) {
    // Start with base query
    $query = Student::with('course')->latest();
    
    // Apply search filter
    if ($request->has('search') && $request->search != '') {
        $query->where(function($q) use ($request) {
            $q->where('name', 'like', '%'.$request->search.'%')
              ->orWhere('id', $request->search);
        });
    }
    
    // Apply course filter
    if ($request->has('course') && $request->course != '') {
        $query->where('course_id', $request->course);
    }
    
    // Apply year level filter
    if ($request->has('year_level') && $request->year_level != '') {
        $query->where('year_level', $request->year_level);
    }
    
    // Get paginated results with query string
    $students = $query->paginate(10)->withQueryString();
    $courses = Course::all();
    return view('students.index', [
        'students' =>    $students,
        'courses' =>    $courses
    ]);
});
Route::get('/students/create', function() {
    $courses = Course::all(); // or however you want to fetch courses
    return view('students.create', [
        'courses' => $courses
    ]);
});




route::get('/students/{id}', function($id){
    $student = Student::with('course')->findorFail($id);

    return view('students.show',[
            'student' =>  $student
    ]);
});

Route::post('/', function() {
        
    request()->validate([
        'name' => ['required', 'min:3'],
        'age' => ['required', 'min:1'],
        'gender' => ['required'],
        'course_id' => ['required', 'exists:courses,id'],
        'year_level' => ['required']
    ]);
    
    Student::create([
        'name' => request('name'),
        'age' => request('age'),
        'gender' => request('gender'),
        'course_id' => request('course_id'),
        'year_level' => request('year_level')
    ]);

    return redirect('/');
});



