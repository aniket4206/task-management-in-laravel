<?php

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
        Schema::table('todos', function (Blueprint $table) {
            $table->enum('task_priority', ['high', 'medium', 'low'])->nullable();
            $table->string('subtask')->nullable();
            $table->date('task_due_date')->nullable();
            $table->dateTime('reminder_at')->nullable();
            $table->enum('recurring', ['daily', 'weekly', 'monthly'])->nullable();
            // $table->integer('day_of_week')->nullable();
            // $table->integer('day_of_month')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('task_priority');
            $table->dropColumn('subtask');
            $table->dropColumn('task_due_date');
            $table->dropColumn('reminder_at');
            $table->dropColumn('recurring');
            // $table->dropColumn('day_of_week');
            // $table->dropColumn('day_of_month');
        });
    }
};
