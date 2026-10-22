<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('degree')->nullable();
            $table->string('branch')->nullable();
            $table->string('passing_year')->nullable();
            $table->boolean('profile_completed')->default(false);
            $table->boolean('is_registered')->default(false); // 1000 rs payment ke baad true hoga
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};