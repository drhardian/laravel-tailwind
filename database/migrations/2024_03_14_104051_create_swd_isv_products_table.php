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
        Schema::create('swd_isv_products', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained()->cascadeOnDelete();
            $table->string('plug_material')->nullable();
            $table->string('seat_material')->nullable();
            $table->string('stem_material')->nullable();
            $table->string('operator')->nullable();
            $table->string('doubleblock_bleed')->nullable();
            $table->string('leakage_class')->nullable();
            $table->string('actuator_mfc')->nullable();
            $table->string('actuator_sn')->nullable();
            $table->string('actuator_model')->nullable();
            $table->string('actuator_size')->nullable();
            $table->string('multi_turn')->nullable();
            $table->string('torque_seated')->nullable();
            $table->string('quarter_turn')->nullable();
            $table->string('position_seated')->nullable();
            $table->string('local_control')->nullable();
            $table->string('remote_control')->nullable();
            $table->string('actuator_ratio')->nullable();
            $table->string('fail_position')->nullable();
            $table->string('gear_mfc')->nullable();
            $table->string('gear_model')->nullable();
            $table->string('gear_size')->nullable();
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
        Schema::dropIfExists('swd_isv_products');
    }
};
