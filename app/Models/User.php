<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\GenderEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    protected $fillable = [
        'country_id',
        'name',
        'email',
        'password',
        'mobile_no',
        'address',
        'gender',
        'dob',
    ];

    use HasFactory, HasRoles, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(TeacherApplication::class);
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'gender' => GenderEnum::class,
        ];
    }
}
