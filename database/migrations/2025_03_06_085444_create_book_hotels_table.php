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
        Schema::create('book_hotels', function (Blueprint $table) {
            $table->id();
            $table->string("hotel_name",255)->unique("unique_hotel_name")->nullable(false);
            $table->string("hotel_image",255)->nullable();
            $table->longText("description");
            $table->string('meta_keyword')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->bigInteger("created_by")->nullable(true);
            $table->bigInteger("updated_by")->nullable(true);
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_hotels');
    }
};
