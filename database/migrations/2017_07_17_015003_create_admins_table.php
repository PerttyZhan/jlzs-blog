<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('admins',function (Blueprint $table){
              $table->charset = 'utf8';
              $table->collation = 'utf8_general_ci';

               $table->increments('id');
               $table->string('username')->unique();
               $table->string('password');

               $table->string('api_token',64)->unique()->nullable();
               $table->index('api_token');

               $table->string('remember_token', 100)->nullable();

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
        Schema::dropIfExists('admins');
    }
}
