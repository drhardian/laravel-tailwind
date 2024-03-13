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
            $table->string('asset_type')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('modelnumber')->nullable();
            $table->string('partnumber')->nullable();
            $table->string('serialnumber')->nullable();
            $table->date('startup')->nullable();
            $table->date('lastexecution')->nullable();
            $table->double('totalhours')->nullable();
            $table->double('numberoftagfailures')->nullable();
            $table->double('numberofserialfailures')->nullable();
            $table->double('testinterval')->nullable();
            $table->double('failurerate')->nullable();
            $table->double('pfd')->nullable();
            $table->string('integritystatus');
            $table->text('defecthighlight')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('pm_activity_schedule');
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
