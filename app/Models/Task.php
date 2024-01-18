<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'note',
        'status_id',
        'estimated_time',
        'owner_id',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function timer(): HasMany
    {
        return $this->hasMany(Timer::class, 'task_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

	public function kanban(): HasOne
	{
		return $this->hasOne(KanbanTask::class, 'task_id');
	}
}
