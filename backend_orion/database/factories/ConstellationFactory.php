<?php

namespace Database\Factories;

use App\Models\Constellation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstellationFactory extends Factory
{
    protected $model = Constellation::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->imageUrl,
            'difficulty_level_id' => \App\Models\DifficultyLevel::factory(),
        ];
    }
}
