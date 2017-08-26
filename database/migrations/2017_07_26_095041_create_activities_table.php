<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->string('difference')->default('activities');
            $table->string('name',25)->nullable();
            $table->string('headline');
            $table->string('title', 100)->nullable();
            $table->integer('view')->default(0);
//            $table->integer('like')->default(0);
            $table->integer('weight')->default(0);
            $table->text('content');
            $table->integer('status')->default('1');
            $table->string('img_src',255)->nullable();

            $table->integer('sort_id')->unsigned()->nullable();
            $table->foreign('sort_id')->references('id')->on('sort_activities');
            $table->string('tag_id',50)->nullable();

            $table->integer('collection')->default(1);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
