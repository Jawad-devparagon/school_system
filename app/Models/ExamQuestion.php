<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamQuestion extends Model
{
     protected $fillable = ['question'];

     public function exam(): BelongsTo
     {
         return $this->belongsTo(Exam::class);
     }

}
