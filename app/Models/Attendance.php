<?php

namespace App\Models;

use App\Enums\StudentsAttendanceEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = ['enrollment_id', 'subject_id', 'date', 'status'];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    protected function casts(): array
    {
        return [
            'status' => StudentsAttendanceEnum::class,
        ];
    }
}
