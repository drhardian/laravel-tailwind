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
        Schema::create('swd_instruction_otherareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instruction_id')->references('id')->on('swd_instructions')->constrained()->cascadeOnDelete();
            $table->foreignId('otherarea_id')->references('id')->on('swd_otherareas')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('swd_instruction_otherareas');
    }
};
