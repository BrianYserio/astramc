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
        Schema::create('hr_employees', function (Blueprint $table) {
                        $table->id(); // replaces row_id

            // Basic Information
            $table->string('employee_id')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthdate')->nullable();

            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated'])->nullable();

            $table->string('citizenship')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->text('caddress')->nullable();

            // Employment Info
            $table->date('date_hired')->nullable();
            $table->string('position')->nullable();
            $table->decimal('basic_salary', 12, 2)->nullable();

            $table->enum('emp_status', [
                'Probationary',
                'Regular',
                'Contractual',
                'Resigned',
                'Terminated'
            ])->default('Probationary');

            $table->date('date_status')->nullable();

            // Leave Balances
            $table->decimal('previous_year_remaining_vl', 8, 2)->default(0);
            $table->decimal('carry_over_vl', 8, 2)->default(0);
            $table->decimal('vl', 8, 2)->default(0);
            $table->decimal('sl', 8, 2)->default(0);
            $table->decimal('bl', 8, 2)->default(0);
            $table->decimal('el', 8, 2)->default(0);
            $table->decimal('ml', 8, 2)->default(0);
            $table->decimal('pl', 8, 2)->default(0);
            $table->decimal('spl', 8, 2)->default(0);
            $table->decimal('paid_vl', 8, 2)->default(0);

            $table->boolean('update_leaves_status')->default(false);
            $table->boolean('additional_leaves_status')->default(false);

            // Government IDs
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('tin')->nullable();

            // Company Info
            $table->string('company')->nullable();
            $table->string('branch')->nullable();
            $table->string('sub_branch')->nullable();
            $table->string('assigned_location')->nullable();

            // Permissions
            $table->json('custom_permissions')->nullable();

            // System Fields
            $table->foreignId('prepared_by')->nullable()->constrained('users')->nullOnDelete();

            $table->boolean('isActive')->default(true);

            $table->timestamp('created_at')->useCurrent(); // replaces date_created
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr_employees');
    }
};
