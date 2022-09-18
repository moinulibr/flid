<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::apiResource('products','ProductController');



Route::group(['prefix' =>'v1'],function(){

    Route::get('check/api',[TestController::class,'index']);

    //get flid logo
    Route::get('get/flid/logo',[ApiController::class,'flidLogo']);

    Route::group(['prefix' =>'nsb'],function(){
        Route::post('post/searching',[ApiController::class,'nsbPostSearching']);
        Route::post('sub/category/searching/{word}',[ApiController::class,'homePageSubCategorySearch']);
    });
    
    //nsb category and subcategory
    Route::group(['prefix' =>'nsb'],function(){
        Route::get('view/{catType}/category/{limit?}',[ApiController::class,'viewNSBCategory']);
        Route::get('view/all/{catType}/category/{limit?}',[ApiController::class,'viewNSBCategory']);
        Route::get('view/single/category/by/{slug}',[ApiController::class,'viewNSBSingleCategoryBySlug']);
        Route::get('view/single/sub/category/by/{slug}',[ApiController::class,'viewNSBSingleCategoryBySlug']);
        

        Route::get('get/subcategory/by/main/category/{slug}/{limit?}',[ApiController::class,'getNSBSubcategoryByMainCategorySlug']);
    });

	//nsb post by category and subcategory wise and post details
    Route::group(['prefix' =>'nsb'],function(){
        Route::get('post/by/category/{categorySlug}',[ApiController::class,'viewNSBCategoryWisePost']);
        Route::get('post/details/by/{postSlug}',[ApiController::class,'viewNSBPostDetailsBySlug']);
    });
	

    //nsb special Notic
    Route::group(['prefix' =>'nsb'],function(){
        Route::get('get/notification/{user_unique_id?}',[ApiController::class,'viewNSBNotification']);
        Route::get('visiting/notification/{id}/{user_unique_id?}',[ApiController::class,'visitingNSBNotification']);
    });

    //Notic :  scrolling_news_tickers
    Route::get('get/exclusive/notice',[ApiController::class,'viewExclusiveNotice']);
	
    

    //মৎস্য ও প্রানিসম্পদ বিশেষ সেবা :
    //flss category and subcategory
    Route::group(['prefix' =>'flss'],function(){
        Route::get('view/{catType}/category/{limit?}',[ApiController::class,'viewFLSSCategory']);
        Route::get('view/all/{catType}/category/{limit?}',[ApiController::class,'viewFLSSCategory']);
        Route::get('view/single/category/by/{slug}',[ApiController::class,'viewFLSSSingleCategoryBySlug']);
        Route::get('view/single/sub/category/by/{slug}',[ApiController::class,'viewFLSSSingleCategoryBySlug']);
    

        Route::get('get/subcategory/by/main/category/{slug}/{limit?}',[ApiController::class,'getFLSSSubcategoryByMainCategorySlug']);
    });

	//flss post by category and subcategory wise and post details
    Route::group(['prefix' =>'flss'],function(){
        Route::get('post/by/category/{categorySlug}',[ApiController::class,'viewFLSSCategoryWisePost']);
        Route::get('post/details/by/{postSlug}',[ApiController::class,'viewFLSSPostDetailsBySlug']);
    });
	//end মৎস্য ও প্রানিসম্পদ বিশেষ সেবা :

    //image slider
    Route::get('get/image/slider',[ApiController::class,'imageSlider']);


    //গুরুর্তপূর্ন লিঙ্ক সমূহ :
    Route::group(['prefix' =>'important/link'],function(){
        Route::get('view/{limit}',[ApiController::class,'getImportantLink']);
        Route::get('all/view',[ApiController::class,'getAllImportantLink']);
    });


    //প্রয়োজনীয় অন্যান্য সেবা:
    Route::get('other/necessary/services',[ApiController::class,'otherNecessaryService']);


    //মিডিয়া:
    Route::group(['prefix' =>'media'],function(){
        Route::get('view/{limit?}',[ApiController::class,'getMedia']);
        Route::get('date/wise/details/view/{date}',[ApiController::class,'dateWiseMediaView']);
        Route::get('date/wise/details/view/by/media/id/{id}',[ApiController::class,'dateWiseMediaViewByMediaId']);
    });

    //সমস্ত পৃষ্ঠা:
    Route::group(['prefix' =>'page'],function(){
        Route::get('view/{limit?}',[ApiController::class,'getPage']);
        Route::get('details/view/by/{slug}',[ApiController::class,'PageDetailsBySlug']);
    });



    //phone number
    Route::get('get/phone/number',[ApiController::class,'getPhoneNumber']);
   
    //Messenger Link
    Route::get('get/messenger/link',[ApiController::class,'getMessengerLink']);

    //Menu
    Route::get('get/menu',[ApiController::class,'getMenu']);

    //user
    Route::get('get/user/details/by/{id}',[ApiController::class,'getUserDetailByUserId']);

});
