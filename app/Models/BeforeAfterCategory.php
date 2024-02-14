<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeAfterCategory extends Model
{
  use HasFactory;
  public function photos()
  {
    return $this->hasMany(BeforeAfterGallery::class, 'category_id', 'id');
  }
}
