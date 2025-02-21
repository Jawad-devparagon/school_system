<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
     protected $fillable = ['student_id', 'classes_id', 'subject_id'];

     public function student(): BelongsTo
     {
         return $this->belongsTo(Student::class);
     }

     public function class(): BelongsTo
     {
         return $this->belongsTo(Classes::class);
     }
     public function section(): BelongsTo
     {
        return $this->belongsTo(Section::class);
     }
}
