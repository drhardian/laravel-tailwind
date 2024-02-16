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
        Schema::create('inventory_prodins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_product_id')->constrained()->restrictOnDelete();
            $table->string('asset_code')->nullable();
            $table->string('prodin_actual')->nullable();
            $table->string('prodin_origin')->nullable();
            $table->string('prodin_budgetorigin')->nullable();
            $table->string('prodin_noref')->nullable();
            $table->date('prodin_datein')->nullable();
            $table->string('prodin_owner')->nullable();
            $table->string('prodin_supplier')->nullable();
            $table->integer('prodin_stockin')->nullable();
            $table->string('prodin_stockloc')->nullable();
            $table->string('prodin_detailloc')->nullable();
            $table->timestamps();
            // $table->string('prodin_image')->nullable();
            // $table->string('prod_code')->nullable();
            // $table->string('prod_name')->nullable();
            // $table->string('remaining_stock')->nullable();
            // $table->string('inv_brand')->nullable();
            // $table->string('inv_owner')->nullable();
            // $table->string('inv_category')->nullable();
            // $table->string('inv_uom')->nullable();
            // $table->string('inv_spec')->nullable();
            // $table->foreignId('inventory_prodin_id')->constrained('catalog_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_prodins');
    }
};
