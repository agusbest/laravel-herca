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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number');
            $table->unsignedBigInteger('marketing_id');
            $table->date('date');
            $table->decimal('cargo_fee', 15, 2);
            $table->decimal('total_balance', 15, 2);
            $table->decimal('grand_total', 15, 2);
            $table->timestamps();
            $table->foreign('marketing_id')->references('id')->on('marketings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
