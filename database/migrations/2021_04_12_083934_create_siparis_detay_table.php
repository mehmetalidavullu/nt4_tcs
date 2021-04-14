<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparisDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis_detay', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('siparisid')->default(0);
            $table->string('siparisno',50);
            $table->integer('urunid')->default(0);
            $table->integer('adet')->default(0);
            $table->float('fiyat');
            $table->string('varyant', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparis_detay');
    }
}
