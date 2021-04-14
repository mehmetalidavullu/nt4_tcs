<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHizmetlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hizmetler', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('sira');
            $table->string('baslik', 255);
            $table->text('metin');
            $table->string('enlem', 100);
            $table->string('boylam', 100);
            $table->integer('tur');
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
        Schema::dropIfExists('hizmetler');
    }
}
