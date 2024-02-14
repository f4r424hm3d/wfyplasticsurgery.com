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
    Schema::create('leads', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('email', 200)->nullable();
      $table->string('c_code', 10)->nullable();
      $table->string('mobile', 20)->nullable();
      $table->integer('age')->nullable();
      $table->string('gender', 20)->nullable();
      $table->string('nationality', 100)->nullable();
      $table->string('medical_report', 200)->nullable();
      $table->text('medical_report_path')->nullable();
      $table->text('message')->nullable();
      $table->text('treatment_name')->nullable();
      $table->string('source', 100)->nullable();
      $table->text('page_url')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('leads');
  }
};
