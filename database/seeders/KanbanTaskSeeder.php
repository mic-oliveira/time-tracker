<?php

namespace Database\Seeders;

use App\Models\KanbanTask;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KanbanTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KanbanTask::factory()->has(Task::factory(), 'task')->count(20)->create();
    }
}
