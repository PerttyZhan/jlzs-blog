<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sort_about', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->string('sort');
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
        Schema::dropIfExists('sort_about');
    }
}
