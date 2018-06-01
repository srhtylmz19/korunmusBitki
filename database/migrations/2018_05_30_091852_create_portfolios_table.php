<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->integer('portfolioCategoryId')->unsigned();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
        Schema::table('portfolios', function (Blueprint $table) {

            $table->foreign('portfolioCategoryId')->references('id')->on('portfolio_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
