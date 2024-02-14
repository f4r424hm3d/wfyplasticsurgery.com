<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentCategory extends Model
{
  use HasFactory;
  public function subCategory()
  {
    return $this->hasMany(TreatmentSubCategory::class, 'category_id', 'id');
  }
  public function treatmentsSubCatNull()
  {
    return $this->hasMany(Treatment::class, 'category_id', 'id')->where('sub_category_id', null);
  }
}
