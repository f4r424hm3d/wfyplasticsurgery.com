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
    Schema::create('treatment_overviews', function (Blueprint $table) {
      $table->id();
      $table->text('title')->nullable();
      $table->longText('description');
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
    Schema::dropIfExists('treatment_overviews');
  }
};
