<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTaskidColumnToTaskIdColumnInProjectUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_updates', function (Blueprint $table) {
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
        Schema::table('project_updates', function (Blueprint $table) {
            $table->renameColumn(
                'task_id',
                'taskid'
            );
        });
    }
}
