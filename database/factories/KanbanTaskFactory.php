<?php

namespace Database\Factories;

use App\Models\KanbanTask;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KanbanTask>
 */
class KanbanTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => Task::factory(),
	        'order_index' => rand(0,99)
        ];
    }
}
