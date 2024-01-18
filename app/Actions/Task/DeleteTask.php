<?php

namespace App\Actions\Task;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteTask
{
    use AsAction;

    public function handle(Task $task): Task
    {
        $task->delete();
        return $task->refresh();
    }
}
