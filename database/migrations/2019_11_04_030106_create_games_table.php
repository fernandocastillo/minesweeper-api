<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->uuid('uuid');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('current_state')->default('initial');
            $table->tinyInteger('rows')->default(5);
            $table->tinyInteger('cols')->default(5);
            $table->tinyInteger('mines')->default(2);

            $table->string('total_time')->nullable();
            $table->text('json_cells')->nullable();

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
        Schema::dropIfExists('games');
    }
}
