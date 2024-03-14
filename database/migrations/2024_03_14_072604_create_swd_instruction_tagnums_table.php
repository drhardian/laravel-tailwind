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
        Schema::create('swd_instruction_tagnums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instruction_id')->constrained()->cascadeOnDelete();
            $table->string('tagnumber')->nullable()->index('idx_product');
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
        Schema::dropIfExists('swd_instruction_tagnums');
    }
};
