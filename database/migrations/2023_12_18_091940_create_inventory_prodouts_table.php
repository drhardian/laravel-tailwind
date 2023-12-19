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
        Schema::create('inventory_prodouts', function (Blueprint $table) {
            $table->id();
            $table->string('prodout_image')->nullable();
            $table->string('prodout_code')->nullable();
            $table->string('prodout_owner')->nullable();
            $table->string('prodout_name')->nullable();
            $table->string('prodout_supplier')->nullable();
            $table->string('prodout_brand')->nullable();
            $table->string('prodoutstock_loc')->nullable();
            $table->string('prodout_category')->nullable();
            $table->date('prodout_stock')->nullable();
            $table->string('prodout_uom')->nullable();
            $table->string('prodout_qty')->nullable();
            $table->string('prodout_spec')->nullable();
            $table->date('date_out')->nullable();
            $table->decimal('prodout_price', 15, 2)->nullable();
            $table->string('prodout_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_prodouts');
    }
};
