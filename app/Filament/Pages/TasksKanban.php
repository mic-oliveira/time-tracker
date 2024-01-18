<?php

namespace App\Filament\Pages;

use App\Enums\TaskStatusEnum;
use App\Models\KanbanTask;
use App\Models\TaskStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;
use function Laravel\Prompts\alert;

class TasksKanban extends KanbanBoard
{
	protected static ?string $title = 'Kanban Task';
	protected static ?string $slug = 'kanban-tasks';

	public bool $disableEditModal = false;

    protected function statuses():Collection
    {
		return TaskStatus::all()->map(function ($status) {
			return ['id' => $status->id, 'value' => $status->name, 'title' => $status->label];
		})->values();
    }

    protected function records(): Collection
    {
        return KanbanTask::orderBy('order_index')->get();
    }

	protected function transformRecords(Model $record): Collection
	{
		return collect([
			'id' => $record->id,
			'title' => $record->id.' - '.$record->task->name,
			'status' => $record->task->status_id,
		]);
	}

	public function onStatusChanged(mixed $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        /*KanbanTask::find($recordId)->task->update(['status_id' => $status]);*/
        // Model::setNewOrder($toOrderedIds);
    }

    public function onSortChanged(mixed $recordId, string $status, array $orderedIds): void
    {
	   /* foreach ($orderedIds as $index => $orderedId) {
			KanbanTask::find($orderedId)->update(['order_index' => $index]);
	    }*/
    }

	protected function getEditModalFormSchema(?int $recordId): array
	{
		return [
			Select::make('status')->options(function() {
				return TaskStatus::all()->mapWithKeys(function (TaskStatus $taskStatus, int $key) {
					return [$key => $taskStatus->label];
				});
			})
		];
	}

	protected function editRecord(int $recordId, array $data, array $state): void
	{
		KanbanTask::find($recordId)->task;
	}

	protected function getMountableModalActionFromAction(Action $action, array $modalActionNames): ?Action
	{
		dd($action);
	}
}
