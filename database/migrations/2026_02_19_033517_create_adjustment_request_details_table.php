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
        Schema::create('adjustment_request_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('arq_no'); // Reference to the ARQ number
            $table->unsignedBigInteger('employee_id'); // ID of the employee
            $table->text('message'); // Message content
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustment_request_details');
    }
};
