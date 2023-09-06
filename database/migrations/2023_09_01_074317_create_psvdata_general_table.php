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
        Schema::create('psvdata_general', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('flow')->nullable();
            $table->string('platform')->nullable();
            $table->string('tag_number')->nullable();
            $table->string('operational')->nullable();
            $table->string('integrity')->nullable();
            $table->date('cert_date')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('valve_number')->nullable();
            $table->string('status')->nullable();
            $table->string('deferal')->nullable();
            $table->string('resetting')->nullable();
            $table->string('resize')->nullable();
            $table->string('demolish')->nullable();
            $table->string('relief')->nullable();
            $table->string('note')->nullable();
            $table->string('cert_package')->nullable();
            $table->string('klarifikasi')->nullable();
            $table->string('by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psvdata_general');
    }
};
