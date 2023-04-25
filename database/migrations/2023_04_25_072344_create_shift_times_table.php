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
        Schema::create('shift_times', function (Blueprint $table) {
            $table->id();
            $table->string('opening_time')->nullable();
            $table->string('closing_time')->nullable();
            $table->string('shift')->nullable();
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->integer('week_holiday_count')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_times');
    }
};
