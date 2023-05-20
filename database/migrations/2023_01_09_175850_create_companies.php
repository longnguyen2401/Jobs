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
    Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tax')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->text('about')->nullable();
            $table->string('website')->nullable();
            $table->string('images')->nullable();
            $table->string('technologies')->nullable();
            $table->integer('people')->nullable();
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->integer('active')->default(0);
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
        Schema::dropIfExists('companies');
    }
};
