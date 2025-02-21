<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExamDateSheet extends Model
{
     protected $fillable = ['classes_id', 'subject_id', 'date', 'time'];

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function exam(): HasOne
    {
        return $this->hasOne(Exam::class);
    }
}
