<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassTeacherSubject extends pivot
{
    use HasFactory;

    protected $table = 'class_teacher_subjects';
    public $incrementing = true;

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    public function class(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
