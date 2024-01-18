<?php

namespace App\Actions\Task;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListTask
{
    use AsAction;

    public function handle(int $per_page=15): LengthAwarePaginator
    {
        return QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
	            AllowedFilter::exact('status', 'status_id')
            ])->paginate($per_page);
    }
}
