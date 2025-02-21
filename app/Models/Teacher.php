<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
     protected $fillable = ['user_id', 'years_of_experience'];

     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }
     public function degrees(): BelongsToMany
     {
         return $this->belongsToMany(Degree::class, 'teacher_degrees');
     }
}
