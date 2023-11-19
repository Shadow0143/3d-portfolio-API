<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('my_name');
            $table->string('title');
            $table->string('image');
            $table->string('bannerimage');
            $table->date('dob')->nullable();
            $table->string('website')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->longText('address')->nullable();
            $table->string('degree')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('insta')->nullable();
            $table->string('skype')->nullable();
            $table->string('likedin')->nullable();
            $table->longText('shortdescription')->nullable();
            $table->longText('longdescription')->nullable();
            $table->enum('status',['1','0']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
