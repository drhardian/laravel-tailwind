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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index('idx_name');
            $table->string('address')->nullable();
            $table->string('city')->index('idx_city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('longitude')->index('idx_longitude')->nullable();
            $table->string('latitude')->index('idx_latitude')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
