<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $roleData = array_map(fn ($role) => ['name' => $role, 'guard_name' => 'web'], RolesEnum::values());

        Role::insert(
            $roleData
        );
    }
}
