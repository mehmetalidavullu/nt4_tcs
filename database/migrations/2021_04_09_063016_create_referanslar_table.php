<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferanslarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referanslar', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('sira');
            $table->string('baslik', 255);
            $table->string('baslik2', 255);
            $table->string('baslik3', 255);
            $table->string('baslik4', 255);
            $table->integer('dilgrup');
            $table->string('dil', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referanslar');
    }
}
