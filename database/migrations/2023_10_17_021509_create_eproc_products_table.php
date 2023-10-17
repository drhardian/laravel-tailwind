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
        Schema::create('eproc_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_image')->nullable();
            $table->string('productmain_code');
            $table->string('product_code');
            $table->string('productsub_code');
            $table->string('productgroup_code');
            $table->string('descrip')->nullable();
            $table->string('specif')->nullable();
            $table->string('brand_eproc')->nullable();
            $table->string('uom_eproc')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
            $table->foreign('productmain_code')->references('titlemain_code')->on('eproc_itemcodes');
            $table->foreign('product_code')->references('title_code')->on('eproc_itemcodes');
            $table->foreign('productsub_code')->references('titlesub_code')->on('eproc_itemcodes');
            $table->foreign('productgroup_code')->references('titlegroup_code')->on('eproc_itemcodes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eproc_products');
    }
};
