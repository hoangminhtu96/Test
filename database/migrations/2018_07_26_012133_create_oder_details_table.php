<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_details', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ten_kh');
            $table->string('tensp');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total');
            $table->integer('oder_id')->unsigned();
            $table->foreign('oder_id')->references('id')->on('oders')->onDelete('cascade');
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
        Schema::dropIfExists('oder_details');
    }
}
