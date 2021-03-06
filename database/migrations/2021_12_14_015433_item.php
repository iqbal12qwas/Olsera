<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //JAWABAN Nomor 1
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('pajak')->unsigned();
            $table->foreign('pajak')->references('id')->on('pajak')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
