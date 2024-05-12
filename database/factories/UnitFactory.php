<?php

namespace Database\Factories;

use App\Enums\DefaultStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "serial" => fake()->regexify('SN-[0-9]{6}-[0-9]{2}'),
            'status'  => $this->faker->randomElement(DefaultStatus::cases())->value,
            "service_offer_id" => \App\Models\ServiceOffer::inRandomOrder()->first()->id,
        ];
    }
}
