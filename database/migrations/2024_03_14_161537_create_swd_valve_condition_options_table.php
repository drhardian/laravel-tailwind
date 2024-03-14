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
        Schema::create('swd_valve_condition_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('valve_condition_subject_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_rating_id')->constrained()->cascadeOnDelete();
            $table->string('title')->index('IDX_Option');
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
        Schema::dropIfExists('swd_valve_condition_options');
    }
};
