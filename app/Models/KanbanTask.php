<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KanbanTask extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $table = 'kanban_tasks';

	protected $fillable = [
		'task_id',
		'order_index',
	];

	public function task(): BelongsTo
	{
		return $this->belongsTo(Task::class, 'task_id');
	}
}
