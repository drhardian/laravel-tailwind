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
        Schema::create('swd_cov_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->references('id')->on('swd_products')->constrained()->cascadeOnDelete();
            $table->string('insulation')->nullable();
            $table->string('leakage_class')->nullable();
            $table->string('flow_direction')->nullable();
            $table->string('actuator_mfc')->nullable();
            $table->string('actuator_sn')->nullable();
            $table->string('actuator_model')->nullable();
            $table->string('actuator_size')->nullable();
            $table->string('fail_position')->nullable();
            $table->string('gear_mfc')->nullable();
            $table->string('gear_model')->nullable();
            $table->string('gear_size')->nullable();
            $table->string('positioner_mfc')->nullable();
            $table->string('positioner_sn')->nullable();
            $table->string('positioner_model')->nullable();
            $table->string('communication_protocol')->nullable();
            $table->string('instrument_acc')->nullable();
            $table->string('instrument_acc_sn')->nullable();
            $table->string('info_rating')->nullable();
            $table->string('info_plug')->nullable();
            $table->string('info_stem')->nullable();
            $table->string('info_body')->nullable();
            $table->string('info_seat')->nullable();
            $table->string('facetoface_dimension')->nullable();
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
        Schema::dropIfExists('swd_cov_products');
    }
};
