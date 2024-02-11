<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentFacility extends Model
{
  use HasFactory;
  public function treatment()
  {
    return $this->hasOne(Treatment::class, 'id', 'treatment_id');
  }
  public function facility()
  {
    return $this->hasOne(Facility::class, 'id', 'facility_id');
  }
}
