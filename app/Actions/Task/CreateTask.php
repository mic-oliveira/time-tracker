<?php

namespace App\Actions\Task;

use App\Models\KanbanTask;
use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTask
{
    use AsAction;

    public function handle(array $data)
    {
		$task = Task::create($data);
		$task->kanban()->create(['order_index' => KanbanTask::max('order_index')+1]);
        return $task;
    }
}
