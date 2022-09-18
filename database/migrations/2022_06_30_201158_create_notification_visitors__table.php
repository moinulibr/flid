<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_visitors', function (Blueprint $table) {
            $table->id();
            $table->integer('notification_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('visitor_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=unseen,1=seen');
            $table->string('seen_at',30)->nullable();
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
        Schema::dropIfExists('notification_visitors_');
    }
}
