<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('guardian_name');
            $table->string('guardian_mobile');
            $table->string('status');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
