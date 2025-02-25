<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('school_class_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('year');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
