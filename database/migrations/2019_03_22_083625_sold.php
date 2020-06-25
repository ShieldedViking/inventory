<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sold extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicament')->unsigned();
            $table->date('date');
            $table->integer('user')->unsigned();
            $table->integer('client')->unsigned();
            $table->integer('pharmacy')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('medicament')
                ->references('id')->on('medicament')
                ->onDelete('cascade');

            $table->foreign('user')
                ->references('id')->on('user')
                ->onDelete('cascade');

            $table->foreign('pharmacy')
                ->references('id')->on('pharmacy')
                ->onDelete('cascade');

            $table->foreign('client')
                ->references('id')->on('client')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold');
    }
}
