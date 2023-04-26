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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->integer('branch_id');
            $table->integer('department_id');
            $table->integer('position_id');
            $table->integer('supervisor')->nullable();
            $table->integer('office_time');
            $table->string('employment_type')->nullable();
            $table->string('user_type')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('work_space')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('leave_allocated')->nullable();
            $table->string('salary')->nullable();
            $table->enum('verification_status',['pending','verified', 'rejected', 'suspended'])->default('pending');
            $table->enum('user_status',['active','inactive'])->default('active');
            $table->string('upload_avatar')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
