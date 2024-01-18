<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Timer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Timer>
 */
class TimerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'task_id' => Task::factory()
        ];
    }
}
