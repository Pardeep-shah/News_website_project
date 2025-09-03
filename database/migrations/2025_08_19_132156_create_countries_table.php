<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name', 100)->unique();
            $table->string('country_code', 10)->unique()->comment('ISO Alpha-2 or Alpha-3 code');
            $table->string('country_tel_code', 10)->comment('Telephone code e.g. +91');
            $table->string('country_time_zone', 50)->comment('Primary time zone e.g. Asia/Kolkata');
            $table->string('country_currency', 50)->comment('Currency name e.g. Indian Rupee');
            $table->string('country_currency_symbol', 10)->comment('Currency symbol e.g. ₹');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
