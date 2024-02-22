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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('ptype_id');
            $table->string('property_name');
            $table->string('property_slug');
            $table->string('property_status');
            $table->string('property_category')->nullable();
            $table->string('price')->nullable();

            $table->string('property_thumbnail');
            $table->text('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('garage')->nullable();
            $table->string('property_size')->nullable();
            $table->string('property_video')->nullable();
            $table->text('address')->nullable();
            $table->string('city_id')->nullable();
            $table->string('state')->nullable();
            $table->string('featured')->nullable();
            $table->string('hot')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};