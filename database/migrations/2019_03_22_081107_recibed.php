<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recibed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibed', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('priceBought',8,2);
            $table->decimal('priceSold',8,2);
            $table->integer('quantity');
            $table->integer('medicament')->unsigned();
            $table->date('date');
            $table->date('expire');
            $table->integer('user')->unsigned();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibed');
    }
}
