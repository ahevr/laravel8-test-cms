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
            $table->id();
            $table->string("url",255)->nullable(true);
            $table->string("title",255)->nullable(true);
            $table->string("desc",255)->nullable(true);
            $table->string("fyt",255)->nullable(true);
            $table->string("isActive",255)->nullable(true);
            $table->string("image",255)->nullable(true);
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
        Schema::dropIfExists('urunler');
    }
}
