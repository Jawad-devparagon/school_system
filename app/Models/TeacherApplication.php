<?php

namespace App\Models;

use App\Enums\TeacherApplicationStatusEnum;
use Glorand\Model\Settings\Traits\HasSettingsField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherApplication extends Model
{
    use HasSettingsField;

     public $settingsFieldName = 'degrees';

     protected $fillable = ['user_id', 'years_of_experience', 'degrees', 'status'];

     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }
     protected function casts(): array
     {
         return [
             'degrees' => 'array',
             'status' => TeacherApplicationStatusEnum::class,
         ];
     }
}
