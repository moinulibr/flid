<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlssCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flss_category_post', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sub_id')->nullable();
            $table->integer('sub_sub_id')->nullable();
            $table->integer('sub_sub_sub_id')->nullable();
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
        Schema::dropIfExists('flss_category_posts');
    }
}
