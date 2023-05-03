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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('check_in')->nullable();
            $table->string('check_in_late')->nullable();
            $table->string('check_in_long')->nullable();
            $table->time('check_out')->nullable();
            $table->string('check_out_late')->nullable();
            $table->string('check_out_long')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('attendance_by')->nullable();
            $table->text('remark')->nullable();
            $table->enum('status',['pending','approved'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
