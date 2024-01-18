<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use App\Models\KanbanTask;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['owner_id'] = Auth::user()->id;
        return parent::mutateFormDataBeforeCreate($data);
    }

	protected function handleRecordCreation(array $data): Model
	{
		$model = parent::handleRecordCreation($data);
		$model->kanban()->create(['order_index' => KanbanTask::max('order_index')+1]);
		return $model;
	}

}
