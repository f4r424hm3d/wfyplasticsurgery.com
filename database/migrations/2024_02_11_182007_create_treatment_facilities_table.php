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
    Schema::create('treatment_facilities', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('facility_id');
      $table->foreign('facility_id')->references('id')->on('facilities')->cascadeOnDelete();
      $table->unsignedBigInteger('treatment_id');
      $table->foreign('treatment_id')->references('id')->on('treatments')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('treatment_facilities');
  }
};
