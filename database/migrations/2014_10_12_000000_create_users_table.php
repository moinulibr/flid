<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->nullable()->comment('0 = pending, 1 = active, 2 = temporary pending, 3 = permanent suspend');
            $table->string('email')->unique();
            $table->string('phone',15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('verified')->default(0);
            $table->tinyInteger('send_user_notification')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('user_role_id')->default(2);
            $table->string('password')->nullable();
            $table->text('photo')->nullable();
            $table->string('designation',100)->nullable();
            $table->text('office_address')->nullable();

            $table->string('avatar')->nullable();
            $table->string('provider', 20)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();
            
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
