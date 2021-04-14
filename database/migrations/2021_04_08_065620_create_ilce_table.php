<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ilce', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('il_id')->unsigned();
            $table->string('adi', 255);

            $table->foreign('il_id')->references('id')->on('il')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ilce');
    }
}
