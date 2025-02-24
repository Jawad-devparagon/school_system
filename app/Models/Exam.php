<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    protected $fillable = ['exam_date_sheet_id', 'no_of_questions', 'total_marks'];

    public function dateSheet(): BelongsTo
    {
        return $this->belongsTo(ExamDateSheet::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(ExamQuestion::class);
    }
}
