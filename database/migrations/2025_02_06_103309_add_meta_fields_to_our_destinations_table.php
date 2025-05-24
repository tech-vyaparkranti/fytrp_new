<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaFieldsToOurDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_destinations', function (Blueprint $table) {
            // Add new columns for meta fields
            $table->string('meta_title')->nullable()->after('destination_image');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_destinations', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn(['meta_title', 'meta_description', 'meta_keywords']);
        });
    }
}
