<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('student_id')->unique(); // Unique student identifier (not same as user_id)
    
    // Links to users table (student user account)
    $table->foreignIdFor(\App\Models\User::class)->constrained()->onDelete('cascade');

    $table->string('name'); // You could split this into first_name and last_name if needed
    $table->integer('age');
    $table->string('gender');
    
    // Links to courses table
    $table->foreignId('course_id')->constrained()->onDelete('cascade');

    $table->string('year_level'); // e.g., '1st Year', '2nd Year', etc.
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
