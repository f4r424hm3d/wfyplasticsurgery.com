<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->hasOne(TreatmentCategory::class, 'id', 'category_id');
  }
  public function subCategory()
  {
    return $this->hasOne(TreatmentSubCategory::class, 'id', 'sub_category_id');
  }
  public function author()
  {
    return $this->hasOne(User::class, 'id', 'author_id');
  }
}
