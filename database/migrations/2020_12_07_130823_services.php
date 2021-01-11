<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Services extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar', 191);
            $table->string('title_en', 191);
            $table->text('content_ar');
            $table->text('content_en');
            $table->integer('price');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('services');
    }
}
