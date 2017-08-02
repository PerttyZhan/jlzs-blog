<?php

use Illuminate\Http\Request;

Route::get('gettest','testController@getpost');
Route::post('posttest','testController@testget');


Route::get('login','AuthController@getLogin',['route' =>'auth.login']);
Route::post('login','AuthController@postLogin');
Route::group(
    ['middleware' => [
            'auth:api'
        ],],function (){
    Route::get('logout','AuthController@logout');

    Route::put('report/{id}','ReportController@status');
    Route::resource('report','ReportController');
    Route::put('activities/{id}','ActivitiesController@status');
    Route::resource('activities','ActivitiesController');
    Route::put('information/{id}','InformationController@status');
    Route::resource('information','InformationController');
    Route::put('about/{id}','AboutController@status');
    Route::resource('about','AboutController');

    Route::resource('sort_reports','SortReportController');
    Route::resource('sort_activities','SortActivitiesController');
    Route::resource('sort_information','SortInformationController');
    Route::resource('sort_about','SortAboutController');

    Route::resource('intag','IntagController');
    Route::resource('retag','RetagController');
    Route::resource('actag','ActagController');
    Route::resource('abtag','AbtagController');

    Route::resource('index_carousel','IndexCarouselController');
    Route::resource('activities_carousel','ActivitiesCarouselController');
    Route::resource('recommend','RecommendController');

    Route::get('website','WebsiteController@index');
    Route::post('website','WebsiteController@update');

    Route::group([
        'prefix'=>'user/{users}',
        'namespace'=>'User',
    ],function (){
        Route::resource('report_comments','ReportCommentController');
        Route::resource('activities_comments','ActivitiesCommentController');
        Route::resource('information_comments','InformationCommentController');
        Route::post('reportcollection/{report_id}','CollectionController@reportcollection');
        Route::post('activitiescollection/{activities_id}','CollectionController@activitiescollection');
        Route::post('informationcollection/{information_id}','CollectionController@informationcollection');

    });

});

