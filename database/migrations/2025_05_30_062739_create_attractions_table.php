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
    Schema::create('attractions', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image'); // image path
        $table->text('short_description')->nullable();
        $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive
        $table->integer('sorting')->default(0);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
