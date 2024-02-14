<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Country;
use App\Models\TreatmentCategory;
use App\Models\TreatmentTestimonial;
use Illuminate\Http\Request;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $testimonials = TreatmentTestimonial::limit(6)->get();
    $blogs = Blog::limit(10)->get();
    $data = compact('testimonials', 'blogs');
    return view('front.index')->with($data);
  }
  public function about(Request $request)
  {
    $testimonials = TreatmentTestimonial::limit(6)->get();
    $blogs = Blog::limit(10)->get();
    $data = compact('testimonials', 'blogs');
    return view('front.about')->with($data);
  }
  public function contactUs(Request $request)
  {
    return view('front.contact');
  }
  public function getFreeQuote(Request $request)
  {
    $doctor_id = null;
    $hospital_id = null;

    $showName = 'Innayat Medical';
    $showImage = asset('front/icons/default-gfq.png');

    $countries = Country::orderBy('name')->get();
    $codes = Country::orderBy('phonecode')->get();
    $data = compact('countries', 'codes', 'showName', 'showImage', 'doctor_id', 'hospital_id');
    return view('front.get-free-quote')->with($data);
  }
}
