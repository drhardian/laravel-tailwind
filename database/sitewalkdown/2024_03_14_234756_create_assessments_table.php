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
        Schema::create('assessments', function (Blueprint $table) {
            $table->uuid('id')->primary(); // assessmentId
            $table->foreignId('instruction_id')->constrained()->cascadeOnDelete(); // column id from table instructions 
            $table->foreignUuid('product_id')->constrained()->cascadeOnDelete(); // column id from table products
            $table->foreignId('device_type_id')->constrained()->cascadeOnDelete(); // column id from table device_types
            $table->foreignId('criticality_level_id')->constrained()->cascadeOnDelete(); // column id from table criticality_levels
            $table->foreignId('health_rating_id')->constrained()->cascadeOnDelete(); // column id from table health_ratings
            $table->foreignId('priority_rating_id')->constrained()->cascadeOnDelete(); // column id from table health_ratings
            $table->foreignId('company_id')->constrained()->cascadeOnDelete(); // column id from table companies
            $table->foreignId('location_type_id')->constrained()->cascadeOnDelete(); // column id from table location_types
            $table->foreignId('location_detail_id')->constrained()->cascadeOnDelete(); // column id from table location_details
            $table->foreignId('area_id')->constrained()->cascadeOnDelete(); // column id from table areas
            $table->mediumText('otherareas');
            $table->mediumText('responsible_people')->nullable();
            $table->date('activity_date'); // date_activity
            $table->string('serial_number')->index('idx_serialnumber'); // serial_number
            $table->string('application')->index('idx_application'); // application
            $table->string('inspected_by'); // from current user
            $table->string('health_level_color')->nullable();
            $table->string('final_recommendation')->nullable(); // final_recommendation
            $table->string('rigging_point_needed')->nullable(); // rigging_point_needed
            $table->string('rigging_point_available')->nullable(); // rigging_point_available
            $table->string('scaffolding_required')->nullable(); // scaffolding_required
            $table->tinyInteger('leak_detection_method')->nullable();
            $table->float('value_a')->nullable();
            $table->float('value_b')->nullable();
            $table->float('value_c')->nullable();
            $table->float('value_d')->nullable();
            $table->string('passing_detection_result')->nullable();
            $table->float('leak_out_value')->nullable();
            $table->float('leak_out_result')->nullable();
            $table->float('voc_leak_value')->nullable();
            $table->string('voc_leak_report_path')->nullable();
            $table->boolean('assessment_record_status');
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
        Schema::dropIfExists('assessments');
    }
};
