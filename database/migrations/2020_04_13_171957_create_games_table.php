<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('games'))
            Schema::drop('games');
        
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->bigInteger('creator_id')->unsigned();
            $table->bigInteger('winner_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('winner_id')->references('id')->on('users');
        });

        Schema::table('users', function($table) {
            $table->foreign('in_game')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
