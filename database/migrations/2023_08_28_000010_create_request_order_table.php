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
        Schema::create('request_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('client_id');
            $table->string('activity_code');
            $table->string('so_number');
            $table->string('ro_number');
            $table->string('contract_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('client_contract');
            $table->foreign('client_id')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_order');
    }
};
