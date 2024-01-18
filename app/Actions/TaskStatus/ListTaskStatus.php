<?php

namespace App\Actions\TaskStatus;

use App\Models\TaskStatus;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListTaskStatus
{
    use AsAction;

    public function handle(int $per_page=15)
    {
        return QueryBuilder::for(TaskStatus::class)->allowedFilters([
			AllowedFilter::partial('name')
        ])->paginate($per_page);
    }
}
