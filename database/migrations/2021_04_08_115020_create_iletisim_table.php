<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIletisimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iletisim', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('sira');
            $table->string('baslik', 255);
            $table->text('adres');
            $table->string('telefon', 255);
            $table->string('telefon2', 255);
            $table->string('telefon3', 255);
            $table->string('gsm', 255);
            $table->string('fax', 255);
            $table->string('email', 255);
            $table->string('neredeyiz', 255);
            $table->string('ulas', 50);
            $table->text('aciklama');
            $table->text('harita');
            $table->integer('dilgrup');
            $table->string('dil',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iletisim');
    }
}
