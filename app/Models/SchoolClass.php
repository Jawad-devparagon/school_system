<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
     protected $fillable = ['name', 'fee'];
     public function enrollments(): HasMany
     {
         return $this->hasMany(Enrollment::class);
     }
     public function sections(): BelongsToMany
     {
         return $this->belongsToMany(Section::class, 'class_sections')->withTimestamps();
     }
     public function subjects(): BelongsToMany
     {
         return $this->belongsToMany(Subject::class, 'class_subjects')->withTimestamps();
     }
     public function examDateSheets(): HasMany
     {
         return $this->hasMany(ExamDateSheet::class);
     }
     public function teachers()
     {
         return $this->belongsToMany(Teacher::class, 'class_teacher_subjects')->withPivot('subject_id')->withTimestamps();
     }
}
