<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
class CoursesController extends Controller
{
    public function index(Request $request)
    {

        $courses = Course::all();
        

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

}
