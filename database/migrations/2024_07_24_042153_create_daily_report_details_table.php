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
        Schema::create('daily_report_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('daily_reports', 'id')->onDelete('cascade')->nullable();
            // $table->unsignedBigInteger('user_id')->constrained('users')->onDelete('cascade');   //for refrence
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('work_hour')->nullable();
            $table->string('work')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_report_details');
    }
};
