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
        Schema::create('catalog_codeitems', function (Blueprint $table) {
            $table->id();
            $table->string('main_code');
            $table->string('titlemain_code');
            $table->string('code');
            $table->string('title_code');
            $table->string('sub_code');
            $table->string('titlesub_code');
            $table->string('group_code');
            $table->string('titlegroup_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_codeitems');
    }
};
