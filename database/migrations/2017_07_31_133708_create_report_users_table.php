<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_users', function (Blueprint $table) {           $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->integer('report_id')->unsigned()->index();
            $table->foreign('report_id')->references('id')->on('reports');

            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('report_users');
    }
}
