<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTaskidColumnToTaskIdColumnInTaskTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_todos', function (Blueprint $table) {
            $table->renameColumn(
                'taskid',
                'task_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_todos', function (Blueprint $table) {
            $table->renameColumn(
                'task_id',
                'taskid'
            );
        });
    }
}