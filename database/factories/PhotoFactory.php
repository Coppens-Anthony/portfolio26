<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition(): array
    {
        return [
            'photo' => $this->faker->word(),
            'project_id' => Project::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
