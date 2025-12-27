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
            $table->string('company_website', 255)->nullable()->after('company_name');
            
            // Make these fields nullable
            $table->string('company_country', 120)->nullable()->change();
            $table->string('zip', 30)->nullable()->change();
            $table->string('phone_country_code', 8)->nullable()->change();
            $table->string('phone_number', 60)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('company_website');

            // Revert fields to not nullable (requires caution if data exists with nulls)
            // For safety in dev environment we can try to revert, but in prod we might need to fill data first.
            // Assuming this is dev/safe:
            $table->string('company_country', 120)->nullable(false)->change();
            $table->string('zip', 30)->nullable(false)->change();
            $table->string('phone_country_code', 8)->nullable(false)->change();
            $table->string('phone_number', 60)->nullable(false)->change();
        });
    }
};
