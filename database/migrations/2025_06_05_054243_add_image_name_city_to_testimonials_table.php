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
        Schema::table('testimonials', function (Blueprint $table) {
            // Add the 'image' column after 'id' or a logical place
            // Assuming image path/name will be stored here
            $table->string('image', 500)->nullable()->after('id');

            // Add the 'heading_bottom' column for Testimonial Name
            // Placing it after heading_middle as per your form structure
            $table->string('heading_bottom', 500)->nullable()->after('heading_middle');

            // Add the 'testimonial_city' column for City
            // Placing it after heading_bottom
            $table->string('testimonial_city', 255)->nullable()->after('heading_bottom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            //
        });
    }
};
