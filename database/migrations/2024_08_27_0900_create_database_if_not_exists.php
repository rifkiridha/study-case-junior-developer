<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Use raw SQL to create the database if it doesn't exist
        // DB::statement('CREATE DATABASE IF NOT EXISTS test_bank_dki');
    }

    public function down()
    {
        DB::statement('DROP DATABASE IF EXISTS test_bank_dki');
        // Schema::dropIfExists('database_if_not_exists');
    }

    /**
     * Reverse the migrations.
     */
};
