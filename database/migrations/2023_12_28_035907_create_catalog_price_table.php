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
        Schema::create('catalog_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalog_price_id');
            $table->string('ctg_price');
            $table->string('ctg_status');
            $table->timestamps();
            $table->foreign('catalog_price_id')->references('id')->on('catalog_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_price');
    }
};
