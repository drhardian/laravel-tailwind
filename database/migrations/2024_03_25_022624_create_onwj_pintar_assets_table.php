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
        Schema::create('onwj_pintar_assets', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('subarea');
            $table->string('platform');
            $table->string('wellname');
            $table->string('tagnumber')->nullable();
            $table->string('controlvalve_mfg')->nullable();
            $table->string('controlvalve_model')->nullable();
            $table->string('radiocomm_mfg')->nullable();
            $table->string('radiocomm_model')->nullable();
            $table->string('controller_mfg')->nullable();
            $table->string('controller_model')->nullable();
            $table->string('serialethconv_mfg')->nullable();
            $table->string('serialethconv_model')->nullable();
            $table->string('analogserialconv_mfg')->nullable();
            $table->string('analogserialconv_model')->nullable();
            $table->string('pressuretransmitter_mfg')->nullable();
            $table->string('pressuretransmitter_model')->nullable();
            $table->string('gasflowtransmitter_mfg')->nullable();
            $table->string('gasflowtransmitter_model')->nullable();
            $table->string('oilflowtransmitter_mfg')->nullable();
            $table->string('oilflowtransmitter_model')->nullable();
            $table->string('turbinemeter_mfg')->nullable();
            $table->string('turbinemeter_size')->nullable();
            $table->string('turbinemeter_kfactor')->nullable();
            $table->string('battery_mfg')->nullable();
            $table->string('battery_model')->nullable();
            $table->integer('battery_qty')->nullable();
            $table->string('solarcell_mfg')->nullable();
            $table->string('solarcell_model')->nullable();
            $table->string('solarcell_qty')->nullable();
            $table->string('chargercontroller_mfg')->nullable();
            $table->string('chargercontroller_model')->nullable();
            $table->string('wellstatus')->nullable();
            $table->string('remotesystem',3)->nullable();
            $table->string('modification')->nullable();
            $table->string('integritystatus')->nullable();
            $table->string('controlvalvestatus')->nullable();
            $table->string('rtu')->nullable();
            $table->string('meter')->nullable();
            $table->string('powersystem')->nullable();
            $table->text('lastpm')->nullable();
            $table->text('defecthighlight')->nullable();
            $table->text('others')->nullable();
            $table->timestamps();

            $table->index('area','idx_area');
            $table->index('subarea','idx_subarea');
            $table->index('platform','idx_platform');
            $table->index('tagnumber','idx_tagnumber');
            $table->index('wellname','idx_wellname');
            $table->index('wellstatus','idx_wellstatus');
            $table->index('remotesystem','idx_remotesystem');
            $table->index('modification','idx_modification');
            $table->index('integritystatus','idx_integritystatus');
            $table->index('controlvalvestatus','idx_controlvalvestatus');
            $table->index('rtu','idx_rtu');
            $table->index('meter','idx_meter');
            $table->index('powersystem','idx_powersystem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onwj_pintar_assets');
    }
};
