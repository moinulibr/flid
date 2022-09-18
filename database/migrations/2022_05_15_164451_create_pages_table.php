<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->text('featured_image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('published_by')->nullable();
            $table->string('published_at',30)->nullable();
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
        Schema::dropIfExists('pages');
    }
}
