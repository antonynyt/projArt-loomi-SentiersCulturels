<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     * By default, the user is a simple user.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstname = fake()->firstName();
        $lastname = fake()->lastName();
        return [
            'pseudo' => strtolower(substr($lastname, 0, 5) . substr($firstname, 0, 1)),
            'organization' => null,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => null,
            'email' => preg_replace('/[^A-Za-z0-9]/', '', $firstname).".".preg_replace('/[^A-Za-z0-9]/', '', $lastname)."@bluewin.ch",
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Create an organization user.
     */
    public function organization(): Factory
    {
        return $this->state(function (array $attributes) {
            $firstname = fake()->firstName();
            $lastname = fake()->lastName();
            $organization = fake()->unique()->company();
            return [
                'pseudo' => strtolower(preg_replace('/[^A-Za-z0-9]/', '', $organization)), // transform to username without spaces and special characters
                'organization' => $organization,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'phone' => "+41 79 ".fake()->numberBetween(100, 999)." ".fake()->numberBetween(10, 99)." ".fake()->numberBetween(10, 99),
                'email' => preg_replace('/[^A-Za-z0-9]/', '', $firstname).".".preg_replace('/[^A-Za-z0-9]/', '', $lastname)."@".preg_replace('/[^A-Za-z0-9]/', '', $organization).".ch",
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
