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
        Schema::create('swd_tnk_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->references('id')->on('swd_products')->constrained()->cascadeOnDelete();
            $table->float('tank_capacity')->nullable();
            $table->string('tank_product')->nullable();
            $table->float('vapor_pressure')->nullable();
            $table->string('specific_gravity')->nullable();
            $table->float('avg_storage_temp')->nullable();
            $table->string('insulated')->nullable();
            $table->string('vents_insulated')->nullable();
            $table->string('heated_chilled')->nullable();
            $table->string('insulation_reduction_factor')->nullable();
            $table->float('max_pump_inrate')->nullable();
            $table->float('max_pump_outrate')->nullable();
            $table->string('blanketing_gas')->nullable();
            $table->string('allowable_tank_moisture')->nullable();
            $table->string('allowable_tank_o')->nullable();
            $table->float('blanket_gas_supply')->nullable();
            $table->float('max_allow_work_press')->nullable();
            $table->float('max_allow_work_vac')->nullable();
            $table->mediumText('notes')->nullable();
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
        Schema::dropIfExists('swd_tnk_products');
    }
};
