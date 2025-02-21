<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    protected $fillable = ['name'];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
    public function class(): BelongsToMany
    {
        return $this->belongsToMany(SchoolClass::class ,'class_sections');
    }

}
