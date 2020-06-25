<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('medicament')->unsigned();
            $table->integer('pharmacy')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('medicament')
                ->references('id')->on('medicament')
                ->onDelete('cascade');

            $table->foreign('pharmacy')
                ->references('id')->on('pharmacy')
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
        Schema::dropIfExists('stock');
    }
}
