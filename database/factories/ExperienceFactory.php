<?php

namespace Database\Factories;

use App\Enums\ExperiencesEnum;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'date' => $this->faker->dateTime(),
            'description' => $this->faker->words(5, true),
            'status' => $this->faker->randomElement(ExperiencesEnum::values()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
