<?php

namespace Database\Factories;

use App\Enums\Tasks\Status;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'status'        => $this->faker->randomElement(Status::cases()),
            'description'   => $this->faker->text(1000),
        ];
    }
}
