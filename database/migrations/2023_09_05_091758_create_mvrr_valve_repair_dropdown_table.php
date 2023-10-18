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
        Schema::create('mvrr_valve_repair_dropdown', function (Blueprint $table) {
            $table->id();
            $table->string('dropdown_label')->nullable();
            $table->string('dropdown_category')->nullable();
            $table->timestamps();
        });

        Schema::table('mvrr_repair_reports', function (Blueprint $table) {
            $table
                ->foreign('work_type')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');
            $table
                ->foreign('order_type')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');
            $table
                ->foreign('scope_of_work')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');
            $table
                ->foreign('repair_type')
                ->references('id')
                ->on('mvrr_valve_repair_dropdown');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_repair_reports', function (Blueprint $table) {
            $table->dropForeign('mvrr_repair_reports_work_type_foreign');
            $table->dropForeign('mvrr_repair_reports_order_type_foreign');
            $table->dropForeign('mvrr_repair_reports_scope_of_work_foreign');
            $table->dropForeign('mvrr_repair_reports_repair_type_foreign');
        });
        Schema::dropIfExists('mvrr_valve_repair_dropdown');
    }
};
