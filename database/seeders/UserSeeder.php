<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Timer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment(['local'])) {
            User::factory()
                ->state([
                    'email' => 'teste@teste.com',
                    'password' => bcrypt('teste')
                ])
                ->has(Task::factory()
                    ->count(rand(1,20))
                    ->has(Timer::factory()->count(rand(1, 5), 'timer')
                    ), 'tasks')->create();
        }
    }
}
