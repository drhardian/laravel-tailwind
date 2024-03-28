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
        Schema::create('inventory_productout_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_productout_transaction_id')->constrained(
                table:'inventory_productout_transactions', indexName:'invprodout_reff_id'
            )->restrictOnDelete();
            $table->foreignId('catalog_product_id')->constrained()->restrictOnDelete();
            $table->string('path');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_productout_references');
    }
};
