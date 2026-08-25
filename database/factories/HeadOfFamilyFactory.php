<?php

namespace Database\Factories;

use App\Models\HeadOfFamily;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<HeadOfFamily>
 */
class HeadOfFamilyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),

            'profile_picture' => $this->faker->imageUrl(),

            'identity_number' => $this->faker->unique()
                ->numberBetween(100000000, 999999999),

            'gender' => $this->faker->randomElement([
                'male',
                'female',
            ]),

            'date_of_birth' => $this->faker
                ->dateTimeBetween('-60 years', 'now'),

            'phone_number' => $this->faker->unique()
                ->phoneNumber(),

            'occupation' => $this->faker->jobTitle(),

            'marital_status' => $this->faker->randomElement([
                'married',
                'single',
            ]),
        ];
    }
}