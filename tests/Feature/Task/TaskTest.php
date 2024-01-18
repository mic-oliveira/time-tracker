<?php

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

const ROUTE = '/api/tasks';

uses(TestCase::class, WithFaker::class, RefreshDatabase::class);

beforeEach(function () {
    User::factory()->create();
    TaskStatus::factory()->sequence([
        'name' => 'do_to'
    ], [
        'name' => 'in_progress'
    ], [
        'name' => 'to_review'
    ], [
        'name' => 'correction'
    ], [
        'name' => 'impediment'
    ])->count(5)->create();
});

it('has task page', function ($task) {
    $response = $this->getJson(ROUTE);
    $response->assertStatus(200);
    expect($task->count())->toBe(10);
    assertDatabaseCount('tasks', $task->count());
})->with('task_list')->repeat(3);

it('create task', function ($task) {
    $response = $this->postJson(ROUTE, $task);
    $response->assertCreated();
    $response->assertJsonStructure([
        'data' => [
            'id',
            'name',
            'status_id',
            'owner_id',
        ]
    ]);
    assertDatabaseHas('tasks', $task);
})->with('tasks_store');


it('update task', function ($tasks) {
    $taskId = $tasks->last()->id;
    $result = $this->putJson(ROUTE.'/'.$taskId, [
        'name' => 'teste'
    ]);
    $result->assertOk();
    assertDatabaseHas('tasks', ['id' => $taskId,'name' => 'teste']);
})->with('task_list');

it('remove task', function ($tasks) {
	$taskId = $tasks->last()->id;
	$result = $this->deleteJson(ROUTE.'/'.$taskId);
	$result->assertOk();
	\Pest\Laravel\assertDatabaseMissing('tasks', ['id' => $taskId,'name' => 'teste']);
})->with('task_list');