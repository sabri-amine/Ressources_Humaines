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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Email')->unique(); 
            $table->string('Hotel');
            $table->string('NameOnCard');
            $table->string('CreditCardNumber')->unique(); 
            $table->unsignedTinyInteger('ExpMonth');
            $table->unsignedSmallInteger('ExpYear');
            $table->string('CVV');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
