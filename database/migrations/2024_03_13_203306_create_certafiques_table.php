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
        Schema::create('certafiques', function (Blueprint $table) {
            $table->id();
            $table->date('date_reservation');
            $table->string('demande');
            $table->enum('validation',['valid','invalid'])->default('invalid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certafiques');
    }
};
