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
        Schema::create('inventory_productout_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('document_number')->unique();
            $table->date('request_date');
            $table->date('productout_date');
            $table->unsignedBigInteger('requested_by');
            $table->unsignedBigInteger('approved_by');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('requested_by')->references('id')->on('employees');
            $table->foreign('approved_by')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_productout_transactions');
    }
};
