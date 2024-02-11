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
    Schema::create('faqs', function (Blueprint $table) {
      $table->id();
      $table->text('question');
      $table->text('answer');
      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('faq_categories');
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
    Schema::dropIfExists('faqs');
  }
};
