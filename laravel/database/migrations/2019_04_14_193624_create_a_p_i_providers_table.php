<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPIProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_i_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('site', 100);
            $table->string('api_url', 255);
            $table->string('class_control', 255);
            $table->tinyInteger('status' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_p_i_providers');
    }
}
