<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('name');
            $table->string('description');
            $table->integer('priority_id');
            $table->integer('status_id');
            $table->integer('task_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable();
            $table->integer('project_id');
            $table->boolean('active')->default(TRUE);
            $table->timestamps();

            // Create a foreign key so on delete cascade works for any child tasks if a parent is deleted...
            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
