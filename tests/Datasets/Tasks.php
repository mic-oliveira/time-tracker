<?php

use App\Models\Task;

dataset('tasks_store', function () {
    return [
        [
            fn() => Task::factory()->makeOne()->toArray(),
        ]
    ];
});

dataset('task_list', function () {
    return [
      [fn() => Task::factory()->count(10)->create()],
    ];
});
