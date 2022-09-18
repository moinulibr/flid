<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNecessaryOtherServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('necessary_other_services', function (Blueprint $table) {
            $table->id();
            $table->string('custom_serial',10)->nullable();
            $table->text('title')->nullable();
            $table->string('side_url',255)->nullable();
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
        Schema::dropIfExists('necessary_other_services');
    }
}
