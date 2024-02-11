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
    Schema::table('treatments', function (Blueprint $table) {
      $table->unsignedBigInteger('author_id')->nullable()->after('sub_category_id');
      $table->foreign('author_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('treatments', function (Blueprint $table) {
      //
    });
  }
};
