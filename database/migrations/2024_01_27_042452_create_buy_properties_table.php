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
        Schema::create('buy_properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->integer('ptype_id')->nullable();
            $table->string('budget');
            $table->string('buy_category')->nullable();
            $table->integer('city_id');
            $table->string('amenities')->nullable();
            $table->string('state_of_community')->nullable();
            $table->string('property_size')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('background_checks')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('additional_requests')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_properties');
    }
};
