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
        Schema::create('mvrr_scope_of_work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->foreign('repair_report_id')->references('id')->on('mvrr_repair_reports');
            $table->unsignedBigInteger('scope_of_work_id')->nullable();
            $table->foreign('scope_of_work_id')->references('id')->on('mvrr_valve_repair_dropdown')->name('scope_of_work_id_fk');
            $table->timestamps();
        });

        Schema::table('mvrr_construction', function (Blueprint $table) {
            $table->unsignedBigInteger('scope_of_work_id');
            $table->foreign('scope_of_work_id')->references('id')->on('mvrr_scope_of_work');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_scope_of_work');

        Schema::table('mvrr_construction', function (Blueprint $table) {
            $table->dropColumn([
                'scope_of_work_id',
            ]);
        });
    }
};
