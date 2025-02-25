<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_no',
        'address',
        'gender',
        'dob',
        'image',
    ];

    use HasFactory, HasRoles, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function application(): HasOne
    {
        return $this->hasOne(TeacherApplication::class);
    }
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
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
