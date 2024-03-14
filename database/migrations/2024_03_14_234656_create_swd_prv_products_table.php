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
        Schema::create('swd_prv_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained()->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('inlet')->nullable();
            $table->string('inlet_choose')->nullable();
            $table->string('outlet')->nullable();
            $table->string('outlet_choose')->nullable();
            $table->string('orifice_size')->nullable();
            $table->string('set')->nullable();
            $table->string('capacity')->nullable();
            $table->string('pilot_operated')->nullable();
            $table->string('choose')->nullable();
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
        Schema::dropIfExists('swd_prv_products');
    }
};
