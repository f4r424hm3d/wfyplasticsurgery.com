<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DynamicPageSeo;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentFc extends Controller
{
  public function index(Request $request, $treatment_slug)
  {
    $treatment = Treatment::where('treatment_slug', $treatment_slug)->firstOrFail();

    $page_url = url()->current();
    $wrdseo = ['url' => 'treatment-detail'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();
    $title = $treatment->treatment_name;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];
    $meta_title = $treatment->meta_title == '' ? $dseo->meta_title : $treatment->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);
    $meta_keyword = $treatment->meta_keyword == '' ? $dseo->meta_keyword : $treatment->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);
    $page_content = $treatment->page_content == '' ? $dseo->page_content : $treatment->page_content;
    $page_content = replaceTag($page_content, $tagArray);
    $meta_description = $treatment->meta_description == '' ? $dseo->meta_description : $treatment->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = null;

    $data = compact('treatment', 'page_url', 'dseo', 'title', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path',);
    return view('front.treatment-details')->with($data);
  }
}
