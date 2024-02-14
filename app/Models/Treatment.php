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
  public function overviews()
  {
    return $this->hasMany(TreatmentOverview::class, 'treatment_id', 'id');
  }
  public function photos()
  {
    return $this->hasMany(TreatmentPhoto::class, 'treatment_id', 'id');
  }
  public function videos()
  {
    return $this->hasMany(TreatmentVideo::class, 'treatment_id', 'id');
  }
  public function faqs()
  {
    return $this->hasMany(TreatmentFaq::class, 'treatment_id', 'id');
  }
  public function testimonials()
  {
    return $this->hasMany(TreatmentTestimonial::class, 'treatment_id', 'id');
  }
  public function facilities()
  {
    return $this->hasMany(TreatmentFacility::class, 'treatment_id', 'id');
  }
  public function siblings()
  {
    return $this->hasMany(Treatment::class, 'category_id', 'category_id')->where('id', '!=', $this->id);;
  }
}
