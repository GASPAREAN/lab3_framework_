<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_tag', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger('task_id');
              $table->unsignedBigInteger('tag_id');

              $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
              $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

              $table->unique(['task_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_tag');
    }
};
