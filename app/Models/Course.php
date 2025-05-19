<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['name', 'description'];


    public function student (){
        return $this->HasMany(Student::class);
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
