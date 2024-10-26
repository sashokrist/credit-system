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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->string('credit_id')->unique();
            $table->string('borrower_name');
            $table->decimal('amount', 10, 2);
            $table->integer('term_months');
            $table->decimal('monthly_payment', 10, 2);
            $table->decimal('remaining_balance', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};