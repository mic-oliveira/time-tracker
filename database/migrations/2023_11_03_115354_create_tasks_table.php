<?php

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->index()->unique();
            $table->text('note')->nullable();
            $table->dateTimeTz('estimated_time')->nullable();
            $table->foreignIdFor(TaskStatus::class, 'status_id')
                ->comment('Task status id')->constrained('task_statuses');
            $table->foreignIdFor(User::class, 'owner_id')->comment('user id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
