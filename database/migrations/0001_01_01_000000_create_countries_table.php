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
            $table->string('name');
            $table->string('country_code');
            $table->string('dial_code');
            $table->string('currency_code');
            $table->string('currency_symbol');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
