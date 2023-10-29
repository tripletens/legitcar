<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keys>
 */
class KeysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $keyType = $this->faker->randomElement(['live', 'test']);

        return [
            'user_id' => 1,
            'value' => md5(bin2hex(random_bytes(32))),
            'status' => true,
            'type' => $keyType,
        ];
    }
}
