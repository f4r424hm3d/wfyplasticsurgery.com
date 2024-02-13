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
    Schema::create('before_after_galleries', function (Blueprint $table) {
      $table->id();
      $table->string('photo_name', 200)->nullable();
      $table->text('photo_path')->nullable();
      $table->string('before_name', 200)->nullable();
      $table->text('before_path')->nullable();
      $table->string('after_name', 200)->nullable();
      $table->text('after_path')->nullable();
      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('before_after_categories')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('before_after_galleries');
  }
};
