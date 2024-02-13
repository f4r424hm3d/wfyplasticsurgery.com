<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentTestimonial extends Model
{
  use HasFactory;
  public function treatment()
  {
    return $this->hasOne(Treatment::class, 'id', 'treatment_id');
  }
}
