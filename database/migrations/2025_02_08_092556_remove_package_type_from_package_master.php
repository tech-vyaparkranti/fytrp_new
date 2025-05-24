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
        Schema::table('package_master', function (Blueprint $table) {
            // Only attempt to drop package_type column if it exists
            if (Schema::hasColumn('package_master', 'package_type')) {
                $table->dropColumn('package_type');
            }
        });
    }
    
    public function down()
    {
        
    }
    
};
