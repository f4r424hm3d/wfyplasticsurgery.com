<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqFc extends Controller
{
  public function index(Request $request)
  {
    $categories = FaqCategory::all();
    $data = compact('categories');
    return view('front.faqs')->with($data);
  }
}
