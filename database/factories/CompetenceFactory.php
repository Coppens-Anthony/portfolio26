<?php

namespace Database\Factories;

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CompetenceFactory extends Factory
{
    protected $model = Competence::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category' => $this->faker->randomElement(CategoriesEnum::values()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
