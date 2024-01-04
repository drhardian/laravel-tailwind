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
            $table->string('itemcode');
            $table->string('product_image')->nullable();
            $table->string('productmain_code');
            $table->string('product_code');
            $table->string('productsub_code');
            $table->string('productgroup_code');
            $table->string('product_name');
            $table->string('product_minstock')->nullable();
            $table->string('product_spec', 3000)->nullable();
            $table->string('product_brand')->nullable();
            $table->string('product_uom')->nullable();
            $table->decimal('product_price', 15, 2)->nullable();
            $table->timestamps();
            $table->unique(
                [
                    'itemcode',
                    'product_name'
                ],
                'unique_code'
            );
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
