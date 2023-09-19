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
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->boolean('ac_checkbox')->default(false);
            $table->text('ac_note')->nullable();
            $table->boolean('construction_change')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->dropColumn([
                'ac_checkbox',
                'ac_note',
                'construction_change',
            ]);
        });
    }
};
