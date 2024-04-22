<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mark;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modele>
 */
class ModeleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mark_ids = Mark::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'mark_id' => $this->faker->randomElement($mark_ids),
        ];
    }
}
