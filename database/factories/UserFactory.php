<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherApplication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile_no' => fake()->unique()->PhoneNumber(),
            'address' => fake()->streetAddress(),
            'email_verified_at' => now(),
            'gender' => fake()->randomElement(GenderEnum::values()),
            'dob' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'image' => 'https://static.vecteezy.com/system/resources/thumbnails/024/183/525/small/avatar-of-a-man-portrait-of-a-young-guy-illustration-of-male-character-in-modern-color-style-vector.jpg',
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {

            $user->assignRole('teacher');

            $teacherApplication = TeacherApplication::factory()->create([
                'user_id' => $user->id,
            ]);

            Student::factory()
                ->has(
                    Enrollment::factory()
                        ->has(
                            Attendance::factory()
                        )
                )
                ->create([
                    'user_id' => $user->id,
                ]);

            $degrees = Degree::query()->inRandomOrder()->limit(2)->get();
            Teacher::factory()
                ->hasAttached($degrees)
                ->create([
                    'user_id' => $user->id,
                    'years_of_experience' => $teacherApplication->years_of_experience,
                ]);
        });
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
