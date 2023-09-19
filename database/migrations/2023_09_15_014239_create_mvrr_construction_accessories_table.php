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
        Schema::create('mvrr_construction_accessories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('construction_id');
            $table->foreign('construction_id')->references('id')->on('mvrr_construction_isolation_valve');
            $table->unsignedBigInteger('ac_accessories_id')->nullable();
            $table->foreign('ac_accessories_id')->references('id')->on('mvrr_repair_reports')->name('pc_ac_accessories_id_fk');
            $table->string('ac_accessories_as');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_construction_accessories');
    }
};
