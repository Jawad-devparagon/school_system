<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'years_of_experience'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function degrees(): BelongsToMany
    {
        return $this->belongsToMany(Degree::class, 'teacher_degrees')->withTimestamps();
    }

    public function schoolClasses(): BelongsToMany
    {
        return $this->belongsToMany(SchoolClass::class, 'class_teacher_subjects')->withPivot('subject_id')->withTimestamps();
    }
}
