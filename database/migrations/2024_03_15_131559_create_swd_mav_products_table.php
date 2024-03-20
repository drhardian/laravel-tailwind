<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swd_mav_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->references('id')->on('swd_products')->constrained()->cascadeOnDelete();
            $table->string('leakage_class')->nullable();
            $table->string('plug_material')->nullable();
            $table->string('seat_material')->nullable();
            $table->string('stem_material')->nullable();
            $table->string('operator')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swd_mav_products');
    }
};
