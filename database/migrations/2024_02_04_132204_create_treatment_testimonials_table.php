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
    Schema::create('treatment_testimonials', function (Blueprint $table) {
      $table->id();
      $table->integer('rating');
      $table->string('review_title', 200);
      $table->text('review');
      $table->string('user_name', 100);
      $table->string('photo_name', 100)->nullable();
      $table->text('photo_path', 100)->nullable();
      $table->unsignedBigInteger('treatment_id')->nullable();
      $table->foreign('treatment_id')->references('id')->on('treatments')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('treatment_testimonials');
  }
};
