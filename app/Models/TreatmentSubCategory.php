<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentSubCategory extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->hasOne(TreatmentCategory::class, 'id', 'category_id');
  }
  public function treatments()
  {
    return $this->hasMany(Treatment::class, 'sub_category_id', 'id');
  }
}
