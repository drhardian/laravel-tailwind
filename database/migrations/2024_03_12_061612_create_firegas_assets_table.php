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
        Schema::create('firegas_assets', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('subarea');
            $table->string('platform');
            $table->string('tagnumber');
            $table->string('sensorlocation');
            $table->string('equipment_type');
            $table->string('asset_type');
            $table->string('manufacturer');
            $table->string('modelnumber');
            $table->string('partnumber');
            $table->string('serialnumber');
            $table->date('startup');
            $table->date('lastexecution');
            $table->double('totalhours');
            $table->double('numberoftagfailures');
            $table->double('numberofserialfailures');
            $table->double('testinterval');
            $table->double('failurerate');
            $table->double('pfd');
            $table->string('integritystatus');
            $table->text('defecthighlight');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firegas_assets');
    }
};
