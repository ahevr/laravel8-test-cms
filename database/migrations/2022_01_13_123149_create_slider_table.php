<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string("baslik")->nullable(true);
            $table->string("desc")->nullable(true);
            $table->string("buton")->nullable(true);
            $table->string("url")->nullable(true);
            $table->string("buton_url")->nullable(true);
            $table->string("buton_adi")->nullable(true);
            $table->string("imagec")->nullable(true);
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
        Schema::dropIfExists('slider');
    }
}
