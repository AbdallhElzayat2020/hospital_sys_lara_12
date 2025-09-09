<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_before_discount', 10, 2);
            $table->decimal('discount_value', 10, 2);
            $table->decimal('total_after_discount', 10, 2);
            $table->string('tax_rate');
            $table->decimal('total_with_tax', 10, 2);
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
