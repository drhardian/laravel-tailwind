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
        Schema::create('catalog_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_image')->nullable();
            $table->string('productmain_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('productsub_code')->nullable();
            $table->string('productgroup_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_merk')->nullable();
            $table->string('product_descrip')->nullable();
            $table->string('product_spec')->nullable();
            $table->string('product_brand')->nullable();
            $table->string('product_uom')->nullable();
            $table->decimal('product_price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_products');
    }
};
