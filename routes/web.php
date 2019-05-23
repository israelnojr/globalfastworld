<?php
use App\Http\Controllers\sliderController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\quotationController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\partnerController;
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

Route::get('/','HomeController@index')->name('welcome');
Route::post('/quotation','quotationController@send')->name('quotation.send');
Route::post('/contact','contactController@send')->name('contact.send');
Route::get('products/category', 'categoryController@index')->name('category.products');
Route::resource('product', 'productController');

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('slider', 'sliderController');
    Route::resource('category', 'categoryController');
    Route::resource('product', 'productController');
    Route::resource('about', 'aboutController');
    Route::resource('event', 'eventController');
    Route::resource('project', 'projectController');
    Route::resource('partner', 'partnerContrller');

    Route::get('quotation','quotationController@index')->name('quotation.index');
    Route::post('quotation/{id}','quotationController@status')->name('quotation.status');
    Route::delete('quotation/{id}','quotationController@destory')->name('quotation.destory');
    Route::get('quotation/{id}','quotationController@show')->name('quotation.show');

    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');

});
    