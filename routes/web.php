<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/students', function () {
    return view('students.index');
});
