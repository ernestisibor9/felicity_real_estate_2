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
        Schema::create('rent_properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->string('rent_category')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('background_checks')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->text('workplace')->nullable();
            $table->string('evicted')->nullable();
            $table->text('rented_before')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('additional_requests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_properties');
    }
};
