<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicament', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            //$table->integer('state')->unsigned();
            $table->string('brand');
            $table->string('content');
            $table->rememberToken();
            $table->timestamps();

            //$table->foreign('state')
            //     ->references('id')->on('state')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament');
    }
}
