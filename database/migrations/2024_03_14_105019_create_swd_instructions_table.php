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
        Schema::create('swd_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('instruction_num')->index('idx_number')->unique();
            $table->date('date_activity_start')->index('idx_startdate');
            $table->date('date_activity_end')->index('idx_enddate');
            $table->foreignId('company_id')->references('id')->on('swd_companies')->constrained();
            $table->foreignId('area_id')->references('id')->on('swd_areas')->constrained();
            $table->longText('notes');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('swd_instructions');
    }
};
