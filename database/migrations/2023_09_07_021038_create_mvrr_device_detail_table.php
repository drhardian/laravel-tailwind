<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mvrr_device_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->unsignedBigInteger('device_type');
            $table->unsignedBigInteger('device_type_selected_type')->nullable();
            $table->unsignedBigInteger('process');
            $table->string('tag_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->timestamps();

            $table
                ->foreign('repair_report_id')
                ->references('id')
                ->on('mvrr_repair_reports');

            $table
                ->foreign('device_type')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');

            $table
                ->foreign('device_type_selected_type')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');

            $table
                ->foreign('process')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_device_detail');
    }
};
