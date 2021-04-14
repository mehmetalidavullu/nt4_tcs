<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdemelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odemeler', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('siparisno',50);
            $table->integer('uye_id');
            $table->float('tutar');
            $table->timestamp('tarih');
            $table->string('kartsahibinincepnumarasi', 255);
            $table->text('aciklama');
            $table->integer('taksit');
            $table->string('kartno', 255);
            $table->string('kartadi', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odemeler');
    }
}
