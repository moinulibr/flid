<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('custom_serial',10)->nullable();
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->integer('main_cat')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sub_id')->nullable();
            $table->integer('sub_sub_id')->nullable();
            $table->integer('sub_sub_sub_id')->nullable();
            $table->text('description')->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
