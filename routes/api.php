<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('counties','ArticleController');
Route::get('singleCounty/{id}','ArticleController@singleCounty');
Route::apiResource('ministries','MinistriesApi');
Route::get('singleMinistry/{id}','MinistriesApi@singleArticle');
Route::apiResource('big4agenda','Big4AgendaApi');
Route::apiResource('notices','NoticesApi');
Route::apiResource('jobs','JobsApi');
Route::get('singleJob/{id}','JobsApi@singleJob');
Route::get('featured/{id}','tendersApi@featured');
Route::apiResource('tenders','tendersApi');
Route::get('singleTender/{id}','tendersApi@singleTender');

//filter jobs
Route::get('filterJobs/{keyword}','JobsApi@filterJobs');

//filter tenders
Route::get('filterTenders/{keyword}','tendersApi@filterTenders');


//notification api
Route::post('insertNotification','NotificationController@insertNotification');
Route::get('fetchNotification/{email}','NotificationController@fetchUsersNotification');

//fetch single user data
Route::get('fetchUser/{email}','NotificationController@fetchUser');

//tender notification api
Route::post('insertTenderNotification','TenderNotificationController@insertNotification');
Route::get('fetchTenderNotification/{email}','TenderNotificationController@fetchUsersNotification');

//latest jobs api
Route::get('latestJobs','JobsApi@latestJobs');

//latest Tenders
Route::get('latestTenders','tendersApi@latestTenders');

//remove notification
Route::get('deleteNotification/{id}/user/{email}','NotificationController@deleteNotification');

//authentication url
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('sign-up', 'AuthController@signup');
    Route::get('user/{email}','AuthController@user');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
