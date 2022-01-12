<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyarlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayarlar', function (Blueprint $table) {
            $table->id();
            $table->string("site_adi")->nullable(true);
            $table->string("site_desc")->nullable(true);
            $table->string("site_logo")->nullable(true);
            $table->string("site_mail")->nullable(true);
            $table->string("telefon")->nullable(true);
            $table->string("adres")->nullable(true);
            $table->string("facebook")->nullable(true);
            $table->string("instagram")->nullable(true);
            $table->string("youtube")->nullable(true);
            $table->string("twitter")->nullable(true);
            $table->string("linkedin")->nullable(true);
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
        Schema::dropIfExists('ayarlar');
    }
}
