<?php


use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\BeforeAfterCategoryC;
use App\Http\Controllers\admin\BeforeAfterPhotoC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\DynamicPageSeoC;
use App\Http\Controllers\admin\FacilityC;
use App\Http\Controllers\admin\FaqC;
use App\Http\Controllers\admin\FaqCategoryC;
use App\Http\Controllers\admin\LeadC;
use App\Http\Controllers\admin\StaticPageSeoC;
use App\Http\Controllers\admin\TreatmentC;
use App\Http\Controllers\admin\TreatmentCategoryC;
use App\Http\Controllers\admin\TreatmentFacilityC;
use App\Http\Controllers\admin\TreatmentFaqC;
use App\Http\Controllers\admin\TreatmentOverviewC;
use App\Http\Controllers\admin\TreatmentPhotoC;
use App\Http\Controllers\admin\TreatmentSubCategoryC;
use App\Http\Controllers\admin\TreatmentTestimonialC;
use App\Http\Controllers\admin\TreatmentVideoC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\front\BeforeAfterFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\FaqFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\LiveTeleConsultationFc;
use App\Http\Controllers\front\TestimonialFc;
use App\Http\Controllers\front\TreatmentFc;
use App\Http\Controllers\front\TreatmentListFc;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('startpage');
// });

//Clear Cache facade value:
Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize:clear');
  return true;
});

//Route cache:
Route::get('/route-cache', function () {
  $exitCode = Artisan::call('route:cache');
  return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
  $exitCode = Artisan::call('route:clear');
  return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
  $exitCode = Artisan::call('view:clear');
  return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
  $exitCode = Artisan::call('config:cache');
  return '<h1>Clear Config cleared</h1>';
});

//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});

Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});

/* FRONT ROUTE */
Route::get('/', [HomeFc::class, 'index']);
Route::get('/about-us', [HomeFc::class, 'about']);
Route::get('/contact-us', [HomeFc::class, 'contactUs']);
Route::get('/thank-you', [HomeFc::class, 'thankYou']);
Route::get('get-free-quote', [HomeFc::class, 'getFreeQuote']);
Route::get('testimonials', [TestimonialFc::class, 'index']);
Route::get('faqs', [FaqFc::class, 'index']);
Route::get('before-after', [BeforeAfterFc::class, 'index']);
Route::get('/thank-you', [HomeFc::class, 'thankYou']);
Route::get('/treatment/{treatment_slug}', [TreatmentFc::class, 'index']);

Route::get('/blog/', [BlogFc::class, 'index']);
Route::get('/blog/{category_slug}/', [BlogFc::class, 'blogByCategory']);
Route::get('/blog/{category_slug}/{title_slug}', [BlogFc::class, 'blogdetail']);


/* ADMIN ROUTES BEFORE LOGIN */
Route::middleware(['adminLoggedOut'])->group(function () {
  Route::get('/admin/login/', [AdminLogin::class, 'index']);
  Route::post('/admin/login/', [AdminLogin::class, 'login']);
});
/* ADMIN ROUTES AFTER LOGIN */
Route::middleware(['adminLoggedIn'])->group(function () {
  Route::get('/admin/logout/', function () {
    session()->forget('adminLoggedIn');
    return redirect('admin/login');
  });
  Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/profile', [AdminDashboard::class, 'profile']);
    Route::post('/update-profile', [AdminDashboard::class, 'updateProfile']);

    Route::prefix('/treatment-categories')->group(function () {
      Route::get('', [TreatmentCategoryC::class, 'index']);
      Route::post('/store', [TreatmentCategoryC::class, 'store']);
      Route::get('get-data', [TreatmentCategoryC::class, 'getData']);
      Route::post('/import', [TreatmentCategoryC::class, 'import']);
      Route::get('/delete/{id}', [TreatmentCategoryC::class, 'delete']);
      Route::get('/update/{id}', [TreatmentCategoryC::class, 'index']);
      Route::post('/update/{id}', [TreatmentCategoryC::class, 'update']);
    });
    Route::prefix('/treatment-sub-categories')->group(function () {
      Route::get('', [TreatmentSubCategoryC::class, 'index']);
      Route::get('get-data', [TreatmentSubCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentSubCategoryC::class, 'delete']);
      Route::get('/update/{id}', [TreatmentSubCategoryC::class, 'index']);
      Route::post('/update/{id}', [TreatmentSubCategoryC::class, 'update']);
      Route::post('/store-ajax', [TreatmentSubCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/treatments')->group(function () {
      Route::get('', [TreatmentC::class, 'index']);
      Route::post('/store', [TreatmentC::class, 'store']);
      Route::get('/delete/{id}', [TreatmentC::class, 'delete']);
      Route::get('/update/{id}', [TreatmentC::class, 'index']);
      Route::post('/update/{id}', [TreatmentC::class, 'update']);
    });

    Route::get('get-sub-category-by-category', [TreatmentC::class, 'getSubCatByCat']);
    Route::get('/treatment/profile/{treatment_id}', [TreatmentC::class, 'profile']);

    Route::prefix('/treatment/facilities/')->group(function () {
      Route::get('get-data', [TreatmentFacilityC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentFacilityC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentFacilityC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentFacilityC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentFacilityC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentFacilityC::class, 'update']);
    });
    Route::prefix('/treatment/faqs/')->group(function () {
      Route::get('get-data', [TreatmentFaqC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentFaqC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentFaqC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentFaqC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentFaqC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentFaqC::class, 'update']);
    });
    Route::prefix('/treatment/overview/')->group(function () {
      Route::get('get-data', [TreatmentOverviewC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentOverviewC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentOverviewC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentOverviewC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentOverviewC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentOverviewC::class, 'update']);
    });
    Route::prefix('/treatment/photos/')->group(function () {
      Route::get('get-data', [TreatmentPhotoC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentPhotoC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentPhotoC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentPhotoC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentPhotoC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentPhotoC::class, 'update']);
    });
    Route::prefix('/treatment/videos/')->group(function () {
      Route::get('get-data', [TreatmentVideoC::class, 'getData']);
      Route::post('/import', [TreatmentVideoC::class, 'import']);
      Route::get('/delete/{id}', [TreatmentVideoC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentVideoC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentVideoC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentVideoC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentVideoC::class, 'update']);
    });
    Route::prefix('/treatment/testimonials/')->group(function () {
      Route::get('get-data', [TreatmentTestimonialC::class, 'getData']);
      Route::get('/delete/{id}', [TreatmentTestimonialC::class, 'delete']);
      Route::post('/store-ajax', [TreatmentTestimonialC::class, 'storeAjax']);
      Route::get('/{treatment_id}/', [TreatmentTestimonialC::class, 'index']);
      Route::get('/{treatment_id}/update/{id}', [TreatmentTestimonialC::class, 'index']);
      Route::post('/{treatment_id}/update/{id}', [TreatmentTestimonialC::class, 'update']);
    });
    Route::prefix('/blog-categories')->group(function () {
      Route::get('', [BlogCategoryC::class, 'index']);
      Route::get('get-data', [BlogCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [BlogCategoryC::class, 'delete']);
      Route::get('/update/{id}', [BlogCategoryC::class, 'index']);
      Route::post('/update/{id}', [BlogCategoryC::class, 'update']);
      Route::post('/store-ajax', [BlogCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/blogs')->group(function () {
      Route::get('', [BlogC::class, 'index']);
      Route::get('get-data', [BlogC::class, 'getData']);
      Route::get('/delete/{id}', [BlogC::class, 'delete']);
      Route::get('/update/{id}', [BlogC::class, 'index']);
      Route::post('/update/{id}', [BlogC::class, 'update']);
      Route::post('/store-ajax', [BlogC::class, 'storeAjax']);
    });
    Route::prefix('/faq-categories')->group(function () {
      Route::get('', [FaqCategoryC::class, 'index']);
      Route::get('get-data', [FaqCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [FaqCategoryC::class, 'delete']);
      Route::get('/update/{id}', [FaqCategoryC::class, 'index']);
      Route::post('/update/{id}', [FaqCategoryC::class, 'update']);
      Route::post('/store-ajax', [FaqCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/faqs')->group(function () {
      Route::get('', [FaqC::class, 'index']);
      Route::get('get-data', [FaqC::class, 'getData']);
      Route::get('/delete/{id}', [FaqC::class, 'delete']);
      Route::get('/update/{id}', [FaqC::class, 'index']);
      Route::post('/update/{id}', [FaqC::class, 'update']);
      Route::post('/store-ajax', [FaqC::class, 'storeAjax']);
    });
    Route::prefix('/before-after-categories')->group(function () {
      Route::get('', [BeforeAfterCategoryC::class, 'index']);
      Route::get('get-data', [BeforeAfterCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [BeforeAfterCategoryC::class, 'delete']);
      Route::get('/update/{id}', [BeforeAfterCategoryC::class, 'index']);
      Route::post('/update/{id}', [BeforeAfterCategoryC::class, 'update']);
      Route::post('/store-ajax', [BeforeAfterCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/before-after-photos')->group(function () {
      Route::get('', [BeforeAfterPhotoC::class, 'index']);
      Route::get('get-data', [BeforeAfterPhotoC::class, 'getData']);
      Route::get('/delete/{id}', [BeforeAfterPhotoC::class, 'delete']);
      Route::get('/update/{id}', [BeforeAfterPhotoC::class, 'index']);
      Route::post('/update/{id}', [BeforeAfterPhotoC::class, 'update']);
      Route::post('/store-ajax', [BeforeAfterPhotoC::class, 'storeAjax']);
    });
    Route::prefix('/static-page-seo')->group(function () {
      Route::get('', [StaticPageSeoC::class, 'index']);
      Route::get('get-data', [StaticPageSeoC::class, 'getData']);
      Route::get('/delete/{id}', [StaticPageSeoC::class, 'delete']);
      Route::get('/update/{id}', [StaticPageSeoC::class, 'index']);
      Route::post('/update/{id}', [StaticPageSeoC::class, 'update']);
      Route::post('/store-ajax', [StaticPageSeoC::class, 'storeAjax']);
    });
    Route::prefix('/dynamic-page-seo')->group(function () {
      Route::get('', [DynamicPageSeoC::class, 'index']);
      Route::get('get-data', [DynamicPageSeoC::class, 'getData']);
      Route::get('/delete/{id}', [DynamicPageSeoC::class, 'delete']);
      Route::get('/update/{id}', [DynamicPageSeoC::class, 'index']);
      Route::post('/update/{id}', [DynamicPageSeoC::class, 'update']);
      Route::post('/store-ajax', [DynamicPageSeoC::class, 'storeAjax']);
    });
    Route::prefix('/authors')->group(function () {
      Route::get('', [UserC::class, 'index']);
      Route::post('/store', [UserC::class, 'store']);
      Route::get('/delete/{id}', [UserC::class, 'delete']);
      Route::get('/update/{id}', [UserC::class, 'index']);
      Route::post('/update/{id}', [UserC::class, 'update']);
    });
    Route::prefix('/facilities')->group(function () {
      Route::get('', [FacilityC::class, 'index']);
      Route::get('get-data', [FacilityC::class, 'getData']);
      Route::get('/delete/{id}', [FacilityC::class, 'delete']);
      Route::get('/update/{id}', [FacilityC::class, 'index']);
      Route::post('/update/{id}', [FacilityC::class, 'update']);
      Route::post('/store-ajax', [FacilityC::class, 'storeAjax']);
    });
    Route::prefix('leads')->group(function () {
      Route::get('', [LeadC::class, 'index']);
      Route::get('/add', [LeadC::class, 'add']);
      Route::post('/store', [LeadC::class, 'store']);
      Route::get('get-quick-info', [LeadC::class, 'getQuickInfo']);
      Route::get('/update-quick-info/', [LeadC::class, 'updateQuickInfo']);
      Route::get('/fetch-last-updated-record/{id}', [LeadC::class, 'fetchLastRecord']);


      Route::get('/add2', [LeadC::class, 'add2']);
      Route::post('/store-ajax', [LeadC::class, 'storeAjax']);
    });
  });
});

Route::prefix('common')->group(function () {
  Route::get('/change-status', [CommonController::class, 'changeStatus']);
  Route::get('/update-field', [CommonController::class, 'updateFieldById']);
  Route::get('/update-bulk-field', [CommonController::class, 'updateBulkField']);
});

Route::prefix('enquiry')->group(function () {
  Route::post('/sidebar-enquiry', [InquiryController::class, 'sidebarInquiry']);
  Route::post('/get-free-quote', [InquiryController::class, 'getFreeQuote']);
  Route::post('/contact-us', [InquiryController::class, 'contactUs2']);
});

Route::post('en/contact-us', [InquiryController::class, 'contactUs']);
