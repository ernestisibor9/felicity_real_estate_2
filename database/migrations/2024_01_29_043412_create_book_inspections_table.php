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
        Schema::create('book_inspections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->date('reservation_date');
            $table->date('move_in_date');
            $table->text('allergies')->nullable();
            $table->integer('ptype_id');
            $table->string('budget');
            $table->string('available_for_inspection');
            $table->string('variation_in_budget');
            $table->string('method_for_paying_rent');
            $table->string('inspection_category')->nullable();
            $table->string('areas_or_neighbourhood')->nullable();
            $table->string('close_amenities_or_facilities')->nullable();
            $table->string('essential_amenities_or_facilities')->nullable();
            $table->text('workplace_commute')->nullable();
            $table->string('public_transport')->nullable();
            $table->string('property_size_layout')->nullable();
            $table->string('safety_decision')->nullable();
            $table->text('rented_property_before')->nullable();
            $table->text('past_experience')->nullable();
            $table->text('aesthetic_design')->nullable();
            $table->string('evicted_rental-related')->nullable();
            $table->string('flexible_move_in_date')->nullable();
            $table->string('lease_terms')->nullable();
            $table->text('specific_community')->nullable();
            $table->string('property_size')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('background_checks')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('additional_requests')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_inspections');
    }
};
