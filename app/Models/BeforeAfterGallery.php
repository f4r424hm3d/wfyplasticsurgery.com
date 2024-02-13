<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeAfterGallery extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->hasOne(BeforeAfterCategory::class, 'id', 'category_id');
  }
}
