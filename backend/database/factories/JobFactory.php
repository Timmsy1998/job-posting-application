<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'company' => $this->faker->company,
            'postedAt' => $this->faker->date,
        ];
    }
}
