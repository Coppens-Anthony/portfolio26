<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'year' => $this->faker->year(),
            'description' => $this->faker->text(),
            'about' => $this->faker->realText(),
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
            'client' => $this->faker->name,
            'client_about' => $this->faker->word(),
            'github' => $this->faker->word(),
            'link' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
