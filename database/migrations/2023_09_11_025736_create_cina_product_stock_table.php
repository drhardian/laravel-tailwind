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
        Schema::create('cina_product_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('cina_product_id')->constrained();
            $table->double('stock_in');
            $table->double('stock_out');
            $table->date('transaction_date');
            $table->foreignId('cina_product_location')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cina_product_stock');
    }
};
