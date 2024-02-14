<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\TreatmentTestimonial;
use Illuminate\Http\Request;

class TestimonialFc extends Controller
{
  public function index(Request $request)
  {
    $testimonials = TreatmentTestimonial::paginate(24);
    $data = compact('testimonials');
    return view('front.testimonials')->with($data);
  }
}
