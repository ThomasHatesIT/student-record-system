<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'age', 'gender','course_id', 'year_level'];

    public function course (){
        return $this->belongsTo(Course::class);
    }
}
