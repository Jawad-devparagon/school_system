<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
         $roles = ['admin', 'teacher', 'student'];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role]);
         }
    }
}
