<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavorilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoriler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("urun_id");
            $table->unsignedBigInteger("kullanici_id");
            $table->integer("adet");
            $table->string("fiyat");
            $table->string("image");
            $table->string("stok_kodu");
            $table->foreign('urun_id')->references('id')->on('urunler')->onDelete("cascade");
            $table->foreign('kullanici_id')->references('id')->on('uyes')->onDelete("cascade");
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
        Schema::dropIfExists('favoriler');
    }
}
