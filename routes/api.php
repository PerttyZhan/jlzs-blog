<?php

use Illuminate\Http\Request;

//Route::get('gettest','testController@getpost');
//Route::post('posttest','testController@testget');
//Route::get('show','testController@show');

//Route::group([
//    'namespace'=>'User',
//    'prefix'=>'user'
//],function (){
//    Route::get('login','AuthController@getLogin',['route' =>'auth.login']);
//    Route::post('login','AuthController@postLogin');
//});


Route::get('login','AuthController@getLogin',['route' =>'auth.login']);
Route::post('login','AuthController@postLogin');
Route::group(
    ['middleware' => [
            'auth:api'
        ],],function (){
    Route::get('logout','AuthController@logout');
    Route::resource('sort_reports','SortReportController');
    Route::resource('sort_activities','SortActivitiesController');
    Route::resource('report','ReportController');
    Route::resource('activities','ActivitiesController');
    Route::resource('about','AboutController');
    Route::resource('information','InformationController');

});

