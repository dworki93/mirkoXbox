<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('active');
            $table->string('platformNick')->nullable();
            $table->string('games', 400)->nullable();
            $table->string('description', 400)->nullable();
            $table->string('platform', 10);
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
        Schema::drop('platforms');
    }
}
