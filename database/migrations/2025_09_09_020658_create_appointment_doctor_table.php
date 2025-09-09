<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('appointment_doctor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('appointments');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointment_doctor');
    }
};
