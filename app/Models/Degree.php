<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Degree extends Model
{
    protected $fillable = ['name'];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_degrees')->withTimestamps();
    }

    public static function getFormattedDegrees(): Collection
    {
        return Degree::all()->map(function ($degree) {
            return [
                'value' => $degree->id,
                'label' => $degree->name,
            ];
        });
    }
}
