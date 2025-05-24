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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            // $table->string('image',500)->nullable(false);
            $table->string('heading_top',500)->nullable(true)->default(null);
            $table->longText('heading_middle')->nullable(true)->default(null);
            // $table->string('heading_bottom',500)->nullable(true)->default(null);
            $table->enum('slide_status',["live","disabled"])->nullable(false)->default("disabled");
            $table->integer('slide_sorting')->nullable(false)->default("1")->index("testimonials_index");
            $table->tinyInteger('status')->default('1')->nullable(false);
            $table->bigInteger("created_by")->nullable(true);
            $table->bigInteger("updated_by")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
