<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {

        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 200);
        });


        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // Requerente
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->integer('atendente_id')->unsigned()->nullable();
            $table->foreign('atendente_id')
                    ->references('id')
                    ->on('users');

            $table->integer('status_id')->unsigned()->default('3');
            $table->foreign('status_id')
                    ->references('id')
                    ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
        Schema::dropIfExists('mesas');
    }
}
