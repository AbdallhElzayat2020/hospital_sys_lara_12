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
        Schema::create('single_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();

            $table->string('invoice_number')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('discount_value', 10, 2)->default(0);
            $table->string('tax_rate');
            $table->string('tax_value');
            $table->decimal('total_with_tax', 10, 2);
            $table->enum('type', ['paid', 'unpaid', 'partially_paid'])->default('unpaid');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('single_invoices');
    }
};
