<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
     protected $fillable = ['name'];

     public function attendances(): HasMany
     {
         return $this->hasMany(Attendance::class);
     }
     public function class(): BelongsToMany
     {
         return $this->belongsToMany(SchoolClass::class, 'class_subjects');
     }
     public function dateSheet(): HasMany
     {
         return $this->hasMany(ExamDateSheet::class);
     }
}
