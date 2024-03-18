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
        Schema::create('car_properties', function (Blueprint $table) {
            $table->id();

            $table->uuid('property_id')->nullable();
            $table->uuid('car_id')->nullable();;
            $table->text('property_value');

            $table->index('property_id', 'property_car_property_idx');
            $table->index('car_id', 'property_car_car_idx');

            $table->foreign('property_id', 'property_car_property_fk')->on('properties')->references('id')->onDelete('set null');
            $table->foreign('car_id', 'property_car_car_fk')->on('cars')->references('id')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_properties');
    }
};
