<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfterCategory;
use Illuminate\Http\Request;

class BeforeAfterFc extends Controller
{
  public function index(Request $request)
  {
    $categories = BeforeAfterCategory::all();
    $data = compact('categories');
    return view('front.before-after')->with($data);
  }
}
