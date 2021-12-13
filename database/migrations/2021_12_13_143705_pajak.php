<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pajak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //JAWABAN Nomor 1
        Schema::create('pajak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('rate', 5,2);
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('item')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pajak');
    }
}
