<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OurWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('our_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar', 191);
            $table->string('title_en', 191);
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('img');
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
        //
         Schema::dropIfExists('our_works');
    }
}
