<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pharmacymedicament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacymedicament', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pharmacy')->unsigned();
            $table->integer('medicament')->unsigned();
            $table->integer('quantity');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('pharmacy')
                ->references('id')->on('pharmacy')
                ->onDelete('cascade');
            
            $table->foreign('medicament')
                ->references('id')->on('medicament')
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
        Schema::dropIfExists('pharmacymedicament');
    }
}
