<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrollingNewsTickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrolling_news_tickers', function (Blueprint $table) {
            $table->id();

            $table->text('title')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('scrolling_news_tickers');
    }
}
