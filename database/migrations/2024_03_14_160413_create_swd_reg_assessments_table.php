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
        Schema::create('swd_reg_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('assessment_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('product_id')->constrained()->cascadeOnDelete();
            $table->string('body_condition')->nullable();
            $table->string('body_condition_level')->nullable();
            $table->longText('body_cause')->nullable();
            $table->longText('body_recommendation')->nullable();
            $table->string('boltnut_condition')->nullable();
            $table->string('boltnut_condition_level')->nullable();
            $table->longText('boltnut_cause')->nullable();
            $table->longText('boltnut_recommendation')->nullable();
            $table->string('bonnet_condition')->nullable();
            $table->string('bonnet_condition_level')->nullable();
            $table->longText('bonnet_cause')->nullable();
            $table->longText('bonnet_recommendation')->nullable();
            $table->string('pilot_condition')->nullable();
            $table->string('pilot_condition_level')->nullable();
            $table->longText('pilot_cause')->nullable();
            $table->longText('pilot_recommendation')->nullable();
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
        Schema::dropIfExists('swd_reg_assessments');
    }
};
