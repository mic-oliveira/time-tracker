<?php

namespace App\Actions\Task;

use App\Models\Task;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateTask
{
    use AsAction;

    public function handle(array $data, Task $task): Task
    {
        $task->fill($data);
        $task->save();
        return $task->refresh();
    }
}
