<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('job_title')->nullable();
            $table->string('about')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('skill')->nullable();
            $table->string('preventive_email')->nullable();
            $table->string('website')->nullable();
            $table->string('project')->nullable();
            $table->string('cv')->nullable();
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
        Schema::dropIfExists('profile_users');
    }
};
