<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
class CoursesController extends Controller
{
    public function index(Request $request)
    {

        $courses = Course::latest()->get();
        

        return view('courses.index', [
            'courses' => $courses,
        ]);
    }
    public function show($id){
        $course = Course::findOrFail($id);
        return view ('courses.show',[
            'course' =>  $course
        ]);
    }

    public function create(){
        $course = Course::all();
        return view('courses.create', [
            'courses' => $course
        ]);
    }

    public function store(request $request){
        $request->validate([
          'name' => ['required', 'min:3'],
            'description' => ['required', 'min:1'],
        ]);

        Course::create([
            'name' => $request->name,    
            'description' => $request->description,
        ]);
        return redirect('/courses');
    }

    public function edit(){

    }
    public function update(){
        $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:1'],
            
        ]);

        $course = Courese::findOrFail($id);

        $course->update([
            'name' => $request->name,    
            'description' => $request->description,
            
        ]);

        return redirect('/courses/' . $course->id)
            ->with('success', 'Student updated successfully.');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect('/courses');
    }
}
