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
        Schema::create('swd_mav_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('assessment_id')->references('id')->on('swd_assessments')->constrained()->cascadeOnDelete();
            $table->foreignUuid('product_id')->references('id')->on('swd_products')->constrained()->cascadeOnDelete();
            $table->string('packing_condition')->nullable();
            $table->string('packing_condition_level')->nullable();
            $table->longText('packing_cause')->nullable();
            $table->longText('packing_recommendation')->nullable();
            $table->string('sealgasket_condition')->nullable();
            $table->string('sealgasket_condition_level')->nullable();
            $table->longText('sealgasket_cause')->nullable();
            $table->longText('sealgasket_recommendation')->nullable();
            $table->string('bonnetgasket_condition')->nullable();
            $table->string('bonnetgasket_condition_level')->nullable();
            $table->longText('bonnetgasket_cause')->nullable();
            $table->longText('bonnetgasket_recommendation')->nullable();
            $table->string('valvebody_condition')->nullable();
            $table->string('valvebody_condition_level')->nullable();
            $table->longText('valvebody_cause')->nullable();
            $table->longText('valvebody_recommendation')->nullable();
            $table->string('valvetrim_condition')->nullable();
            $table->string('valvetrim_condition_level')->nullable();
            $table->longText('valvetrim_cause')->nullable();
            $table->longText('valvetrim_recommendation')->nullable();
            $table->string('boltnut_condition')->nullable();
            $table->string('boltnut_condition_level')->nullable();
            $table->longText('boltnut_cause')->nullable();
            $table->longText('boltnut_recommendation')->nullable();
            $table->string('gearbox_condition')->nullable();
            $table->string('gearbox_condition_level')->nullable();
            $table->longText('gearbox_cause')->nullable();
            $table->longText('gearbox_recommendation')->nullable();
            $table->string('manualoverride_condition')->nullable();
            $table->string('manualoverride_condition_level')->nullable();
            $table->longText('manualoverride_cause')->nullable();
            $table->longText('manualoverride_recommendation')->nullable();
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
        Schema::dropIfExists('swd_mav_assessments');
    }
};
