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
            $table->string('name');
            $table->string('surname');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('city_id');
            $table->string('qr_code', 255)->nullable();
            $table->string('device_id', 255)->nullable();
            $table->string('open_udid', 255);
            $table->string('device_user_name', 255)->nullable();
            $table->string('device_version_number', 255)->nullable();
            $table->decimal('lat', 11, 8);
            $table->decimal('lng', 11, 8);
            $table->integer('address_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
