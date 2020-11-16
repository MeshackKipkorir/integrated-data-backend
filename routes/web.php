<?php

use Illuminate\Support\Facades\Route;
use App\Counties;
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

Route::get('/', function () {
    return view('main.index');
});

Route::get('tenders/',function(){
  return view('main.category-details');
});
Route::get('counties/',function(){
  return view('main.counties-details',['articles' => Counties::paginate(12)]);
});
Route::prefix('home')->group(function(){
  Route::get('blog/',function(){return view('blog')->name('blog');});
  Route::get('tenders/',function(){
    return view('category-details');
  })->name('tenders');
});


Route::prefix('dashboard')->group(function(){
  Route::get('/','dashboardController@index');

  // counties routes
  Route::get('counties/','countiesController@index')->name('counties');
  Route::get('counties/{id}/edit','countiesController@edit')->name('editCounties');
  Route::put('counties/{id}','countiesController@update')->name('updateCounties');
  Route::get('counties/create','countiesController@create')->name('createCounties');
  Route::post('counties/create','countiesController@store')->name('storeCounties');
  Route::get('counties/{id}','countiesController@destroy')->name('deleteCounties');
  Route::get('countiesScraper/','scrapController@scrapCounties');

  // ministries routes
  Route::get('ministries/','ministriesController@index')->name('ministries');
  Route::get('ministries/{id}/edit','ministriesController@edit')->name('editMinistries');
  Route::put('ministries/{id}','ministriesController@update')->name('updateMinistries');
  Route::get('ministries/create','ministriesController@create')->name('createMinistries');
  Route::post('ministries/create','ministriesController@store')->name('storeMinistries');
  Route::get('ministries/{id}','ministriesController@destroy')->name('deleteMinistries');
  Route::get('ministriesScraper/','scrapController@scrapMinistries');

  //big4agenda routes
  Route::get('big4agenda/','big4agendaController@index')->name('big4agenda');
  Route::get('big4Agenda/{id}/edit','big4AgendaController@edit')->name('editBig4Agenda');
  Route::put('big4Agenda/{id}','big4AgendaController@update')->name('updateBig4Agenda');
  Route::get('big4Agenda/create','big4AgendaController@create')->name('createBig4Agenda');
  Route::post('big4Agenda/create','big4AgendaController@store')->name('storeBig4Agenda');
  Route::get('big4Agenda/{id}','big4AgendaController@destroy')->name('deleteBig4Agenda');
  Route::get('big4agendaScraper/','scrapController@scrapBig4agenda');

  //Notices Routes
  Route::get('noticesScrapper/','scrapController@scrapNotices');
  Route::get('notices/','noticesController@index')->name('notices');
  Route::get('notices/{id}/edit','noticesController@edit')->name('editNotices');
  Route::put('notices/{id}','noticesController@update')->name('updateNotices');
  Route::get('notices/create','noticesController@create')->name('createNotices');
  Route::post('notices/create','noticesController@store')->name('storeNotices');
  Route::get('notices/{id}','noticesController@destroy')->name('deleteNotices');


  //Tenders Routes
  Route::get('tendersScraper/','scrapController@scrapTenders');

  //Jobs scraper
  Route::get('jobScraper/','scrapController@scrapJobs');

  //scrap everything
  Route::get('scrap/','scrapController@scrap');
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
