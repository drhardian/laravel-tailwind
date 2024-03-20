<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swd_otherareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('swd_companies')->constrained()->cascadeOnDelete();
            $table->foreignId('area_id')->references('id')->on('swd_areas')->constrained()->cascadeOnDelete();
            $table->string('title')->index('idx_subarea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swd_otherareas');
    }
};
