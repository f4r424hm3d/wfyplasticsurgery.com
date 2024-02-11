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
    Schema::create('treatment_photos', function (Blueprint $table) {
      $table->id();
      $table->string('title', 100)->nullable();
      $table->string('photo_name', 100);
      $table->text('photo_path');
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
    Schema::dropIfExists('treatment_photos');
  }
};
