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
    Schema::create('treatment_sub_categories', function (Blueprint $table) {
      $table->id();
      $table->string('sub_category_name');
      $table->string('sub_category_slug');
      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('treatment_categories');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('treatment_sub_categories');
  }
};
