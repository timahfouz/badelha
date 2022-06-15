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
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->double('points')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('firebase')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('image_id')->on('media')->references('id')->onDelete('set null');
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
