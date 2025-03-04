<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePjidColumnToProjectIdColumnInProjectNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_notes', function (Blueprint $table) {
            $table->renameColumn(
                'pjid',
                'project_id'
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
        Schema::table('project_notes', function (Blueprint $table) {
            $table->renameColumn(
                'project_id',
                'pjid'
            );
        });
    }
}
