<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Enums\RolesEnum;
use App\Models\Attendance;
use App\Models\Country;
use App\Models\Degree;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherApplication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_no' => $this->faker->unique()->PhoneNumber(),
            'address' => $this->faker->streetAddress(),
            'country_id' => Country::query()->inRandomOrder()->limit(1)->value('id'),
            'email_verified_at' => now(),
            'gender' => $this->faker->randomElement(GenderEnum::values()),
            'dob' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'image' => 'https://static.vecteezy.com/system/resources/thumbnails/024/183/525/small/avatar-of-a-man-portrait-of-a-young-guy-illustration-of-male-character-in-modern-color-style-vector.jpg',
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $role = Role::whereIn('name', [RolesEnum::TEACHER, RolesEnum::STUDENT])->inRandomOrder()->pluck('name')->first();

            $user->assignRole($role);
            if ($role === RolesEnum::TEACHER->value) {
                $this->createTeacher($user);
            } else {
                $this->createStudent($user);
            }
        });
    }

    private function createTeacher($user)
    {
        $teacherApplication = TeacherApplication::factory()->create([
            'user_id' => $user->id,
        ]);

        $degrees = $teacherApplication->settings()->get('ids');

        $degreeInstances = Degree::whereIn('id', $degrees)->get();

        Teacher::factory()
            ->hasAttached($degreeInstances)
            ->create([
                'user_id' => $user->id,
                'years_of_experience' => $teacherApplication->years_of_experience,
            ]);
    }

    private function createStudent($user)
    {
        Student::factory()
            ->has(
                Enrollment::factory()
                    ->has(Attendance::factory())
            )
            ->create([
                'user_id' => $user->id,
            ]);
    }
}
