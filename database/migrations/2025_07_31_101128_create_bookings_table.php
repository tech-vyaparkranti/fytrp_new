<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('bookings_new', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key

            // Fields from your $fillable array:
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->date('travel_date');
            $table->integer('traveller_count');
            $table->string('package_name')->nullable(); // Assuming package name might be optional or pre-filled
            $table->decimal('amount', 10, 2); // 10 total digits, 2 after the decimal point for currency
            $table->string('order_id')->nullable(); // Order ID can be null initially, populated after payment gateway interaction
            $table->string('payment_status')->default('pending'); // Default status for a new booking

            $table->timestamps(); // Adds `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings_new');
    }
};
