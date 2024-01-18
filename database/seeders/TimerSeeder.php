<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Timer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class TimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment(['local'])) {
            Timer::factory()->count(10)->has(Task::factory())->create();
        }
    }
}
