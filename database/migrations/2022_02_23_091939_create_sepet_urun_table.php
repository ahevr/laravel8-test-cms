<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepetUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepet_urun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sepet_id");
            $table->unsignedBigInteger("urun_id");
            $table->integer("adet");
            $table->string("fiyat");
            $table->string("durum",30);
            $table->foreign('urun_id')->references('id')->on('urunler')->onDelete("cascade");
            $table->foreign('sepet_id')->references('id')->on('sepet')->onDelete("cascade");
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
        Schema::dropIfExists('sepet_urun');
    }
}
