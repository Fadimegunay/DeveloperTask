<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('task_id');
            $table->integer('week');
            $table->timestamps();

            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onDelete('CASCADE');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_tasks');
    }
}
