<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUyelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uyeler', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('isim', 255);
            $table->string('email', 255);
            $table->string('sifre', 255);
            $table->string('admin', 2)->comment('1 ise Ana yöneticidir');
            $table->string('yetki', 255);
            $table->text('mail_token');
            $table->string('avatar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uyeler');
    }
}
