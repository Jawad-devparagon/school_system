<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SchoolClass extends Model
{
    protected $fillable = ['name', 'fee'];

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'class_sections')->withTimestamps();
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'class_subjects')->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'class_teacher_subjects')->withPivot('subject_id')->withTimestamps();
    }
}
