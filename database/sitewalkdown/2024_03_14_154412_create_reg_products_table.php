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
        Schema::create('reg_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained()->cascadeOnDelete();
            $table->string('orifice_size')->nullable();
            $table->string('spring_range')->nullable();
            $table->string('spring_color')->nullable();
            $table->string('setpoint')->nullable();
            $table->string('pilot_mfc')->nullable();
            $table->string('pilot_model')->nullable();
            $table->string('pilot_springrange')->nullable();
            $table->string('valve_size')->nullable();
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
        Schema::dropIfExists('reg_products');
    }
};
