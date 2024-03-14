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
        Schema::create('swd_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('device_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('criticality_level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_rating_id')->constrained()->cascadeOnDelete(); // column id from table health_ratings
            $table->foreignId('priority_rating_id')->constrained()->cascadeOnDelete(); // column id from table health_ratings
            $table->string('health_level_color')->nullable();
            $table->string('tagnum')->unique()->index('idx_tagnum');
            $table->string('serial_number')->index('idx_serialnumber');
            $table->string('application')->index('idx_application');
            $table->string('name_plate')->index('idx_nameplate');
            $table->string('body_mfc')->index('idx_bodymfc')->nullable();
            $table->string('body_sn')->index('idx_bodysn')->nullable();
            $table->string('body_model')->nullable();
            $table->string('body_material')->nullable();
            $table->string('body_size')->index('idx_bodysize')->nullable();
            $table->string('class_rating')->index('idx_classrating')->nullable();
            $table->string('manual_override')->nullable();
            $table->string('end_connection')->nullable();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('area_id')->constrained()->cascadeOnDelete();
            $table->mediumText('otherareas');
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
        Schema::dropIfExists('swd_products');
    }
};
