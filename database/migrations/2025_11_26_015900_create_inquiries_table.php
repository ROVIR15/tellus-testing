<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 120);
            $table->string('last_name', 120)->nullable();
            $table->string('company_name', 180);
            $table->string('company_country', 120);
            $table->string('company_city', 120);
            $table->string('company_address', 255);
            $table->string('zip', 30);
            $table->string('phone_country_code', 8);
            $table->string('phone_number', 60);
            $table->string('email', 180);
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};