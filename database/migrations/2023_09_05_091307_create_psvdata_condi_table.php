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
        Schema::create('psvdata_condi', function (Blueprint $table) {
            $table->id();
            $table->string('shutdown')->nullable();
            $table->string('valve_upstream')->nullable();
            $table->string('condi_upstream')->nullable();
            $table->string('valve_downstream')->nullable();
            $table->string('condi_downstream')->nullable();
            $table->string('scaffolding')->nullable();
            $table->string('spacer_inlet')->nullable();
            $table->string('spacer_outlet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psvdata_condi');
    }
};
