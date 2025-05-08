<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;



Route::get('/', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/', [StudentController::class, 'store']);  
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::patch('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);



Route::get('/courses', [CoursesController::class, 'index']);
Route::get('/courses/create', [CoursesController::class, 'create']);
Route::post('/courses',[CoursesController::class,'store']);
Route::get('courses/{id}', [CoursesController::class, 'show']);
Route::get('courses/{id}/edit', [CoursesController::class, 'edit']);
Route::delete('/courses/{id}', [CoursesController::class, 'destroy']);