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
        Schema::create('adjustment_request', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('arq_no')->unique(); // ARQ number, unique
            $table->date('transaction_date'); // Date of the transaction
            $table->unsignedBigInteger('department_id'); // Foreign key reference to departments table
            $table->string('nature_of_request'); // Nature/Type of the request
            $table->string('requested_by'); // Name or ID of requester
            $table->string('prepared_by'); // Name or ID of preparer
            $table->string('benefit')->nullable(); // Optional benefit field
            $table->dateTime('date_created')->useCurrent(); // Auto-set creation date
            $table->string('status')->default('pending'); // Status e.g., pending, approved
            $table->text('reason_disapproved')->nullable(); // Reason if disapproved
            $table->text('reason_cancelled')->nullable(); // Reason if cancelled
            $table->string('reference')->nullable(); // Reference number
            $table->string('module')->nullable(); // Module name or type
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustment_request');
    }
};
