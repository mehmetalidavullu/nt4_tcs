<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('ustid',11);
            $table->char('tur', 1);
            $table->integer('sira');
            $table->string('baslik', 255);
            $table->string('baslik2', 255);
            $table->string('baslik3', 255);
            $table->text('metin');
            $table->string('link', 255);
            $table->string('link1', 255);
            $table->string('link2', 255);
            $table->string('link3', 255);
            $table->string('hidden', 2);
            $table->string('acik', 2);
            $table->integer('tip');
            $table->integer('dilgrup');
            $table->string('dil', 2);
            $table->text('description');
            $table->text('keywords');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urunler');
    }
}
