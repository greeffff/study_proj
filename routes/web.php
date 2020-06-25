<?php

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
Route::auth();
Route::get('/', function () {
    return view('home');
});
Route::group(['prefix'=>'queue','as'=>'queue.',],function (){
   Route::get('send_to_log','QueueController@send_to_log')->name('send_to_log');
   Route::get('send_to_log_many','QueueController@send_to_log_many')->name('send_to_log_many');
});
Route::group(['prefix'=>'vue','as'=>'vue.',],function () {
    Route::get('image-upload','VueController@uploadFileIndex')->name('uploadFileIndex');

    Route::post('image-upload-post','VueController@uploadFile')->name('uploadFile');

    Route::get('sendData','VueController@sendDataIndex')->name('sendDataIndex');

    Route::get('sendDataAjax','VueController@sendDataAjaxIndex')->name('sendDataAjaxIndex');
    Route::get('sendDataAjax/get','VueController@sendDataAjax')->name('sendDataAjaxIndex-get');

    Route::get('chartAjax','VueController@chartAjaxIndex')->name('chartAjaxIndex');
    Route::get('chartAjax/get','VueController@chartAjax')->name('chartAjax-get');

    Route::get('chartSocket','VueController@chartSocket')->name('chartSocketIndex');
    Route::get('chartSocket/get','VueController@newEvent')->name('chartSocket-get');

    Route::get('chat','VueController@chatIndex')->name('allChatIndex');
    Route::get('chat/sendMessage','VueController@chatMessage')->name('chatMessage');

});
