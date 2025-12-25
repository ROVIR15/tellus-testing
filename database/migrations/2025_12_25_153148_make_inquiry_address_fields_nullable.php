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
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('company_city', 120)->nullable()->change();
            $table->string('company_address', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('company_city', 120)->nullable(false)->change();
            $table->string('company_address', 255)->nullable(false)->change();
        });
    }
};
