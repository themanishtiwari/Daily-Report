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
        Schema::create('daily_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('good_level')->default('6');
            $table->string('moderate_level')->default('4');
            $table->string('poor_level')->default('2');
            $table->string('profile_pic')->nullable();
            $table->string('avatar')->nullable();
            $table->string('social_id')->nullable()->index();
            $table->string('social_type')->comment('1=google, 2=facebook')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_users');
    }
};
