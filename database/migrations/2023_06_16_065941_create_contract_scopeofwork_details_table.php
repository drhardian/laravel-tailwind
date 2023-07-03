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
        Schema::create('contract_scopeofwork_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_scopeofwork_id')->constrained()->cascadeOnDelete();
            $table->foreignId('scopeof_work_id')->constrained()->cascadeOnDelete();
            $table->double('scope_weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_scopeofwork_details');
    }
};
