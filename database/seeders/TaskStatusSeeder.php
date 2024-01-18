<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskStatus::factory()->sequence([
			'label' => 'TO DO',
            'name' => 'do_to',
        ], [
	        'label' => 'IN PROGRESS',
            'name' => 'in_progress'
        ], [
	        'label' => 'TO REVIEW',
            'name' => 'to_review'
        ], [
	        'label' => 'TO CORRECTION',
            'name' => 'correction'
        ], [
	        'label' => 'IMPEDIMENT',
            'name' => 'impediment'
        ])->count(5)->create();
    }
}
