<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('site_title')->nullable();
            $table->text('tagline')->nullable();
            $table->text('site_icon')->nullable();
            $table->text('admin_logo')->nullable();
            $table->text('apps_logo')->nullable();
            $table->string('scroll_speed')->nullable();
            $table->string('scroll_color')->nullable();
            $table->string('scroll_font_size')->nullable();

            $table->string('flid_website_url')->nullable();
            $table->string('flid_facebook_url')->nullable();
            $table->string('rate_app')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook_messenger_url')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
