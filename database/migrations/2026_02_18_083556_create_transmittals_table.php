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
        Schema::create('transmittals', function (Blueprint $table) {
            $table->id();
            // Format: TRM2500001
            $table->string('trn_no', 15)->unique();

            // Format: EMP240038
            $table->string('prepared_by', 10);
            $table->string('sender', 10);
            $table->string('recipient', 10);

            $table->date('date_created');
            $table->string('subject');
            $table->text('others')->nullable();

            $table->string('checked_by', 10)->nullable();
            $table->string('approved_by', 10)->nullable();
            $table->string('received_by', 10)->nullable();
            $table->date('date_received')->nullable();

            $table->text('remarks')->nullable();

            // Example: pending, approved, cancelled
            $table->enum('status', ['pending', 'checked', 'approved', 'received', 'cancelled'])
                  ->default('pending');

            $table->string('cancelled_reason')->nullable();
            $table->string('cancelled_by', 10)->nullable();

            $table->softDeletes(); // deleted_at
            $table->timestamps();  // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmittals');
    }
};
