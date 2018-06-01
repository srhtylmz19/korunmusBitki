<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->integer('portfolioId')->unsigned();
            $table->integer('image_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
        Schema::table('galleries', function (Blueprint $table) {

            $table->foreign('portfolioId')->references('id')->on('portfolios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
