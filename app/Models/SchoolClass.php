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
         return $this->belongsToMany(Section::class, 'class_sections');
     }
     public function subjects(): BelongsToMany
     {
         return $this->belongsToMany(Subject::class, 'class_subjects');
     }
     public function examDateSheets(): HasMany
     {
         return $this->hasMany(ExamDateSheet::class);
     }
}
