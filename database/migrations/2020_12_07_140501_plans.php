<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar', 191);
            $table->string('title_en', 191);
            $table->text('content_ar');
            $table->text('content_en');
            $table->integer('price');
            $table->boolean('status')->default(1);
            $table->text('img');
            $table->timestamps();
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')
                    ->references('id')->on('services');
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
        Schema::dropIfExists('plans');
    }
}
