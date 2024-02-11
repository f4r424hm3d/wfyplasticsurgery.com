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
    Schema::create('treatments', function (Blueprint $table) {
      $table->id();
      $table->string('treatment_name');
      $table->string('treatment_slug');
      $table->string('image_name')->nullable();
      $table->string('image_path')->nullable();
      $table->unsignedBigInteger('category_id')->nullable();
      $table->foreign('category_id')->references('id')->on('treatment_categories')->nullOnDelete();
      $table->unsignedBigInteger('sub_category_id');
      $table->foreign('sub_category_id')->references('id')->on('treatment_sub_categories')->cascadeOnDelete();
      $table->text('meta_title')->nullable();
      $table->text('meta_keyword')->nullable();
      $table->longText('meta_description')->nullable();
      $table->text('page_content')->nullable();
      $table->integer('seo_rating')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('treatments');
  }
};
