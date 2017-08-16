<?php

use Illuminate\Http\Request;

Route::get('login','AuthController@getLogin',['route' =>'auth.login']);
Route::post('login','AuthController@postLogin');
Route::get('website','WebsiteController@index');

Route::group(
    ['middleware' => [
            'auth:api-user'
        ],],function (){
    Route::post('api_upload','ApiUploadController@upload');
    Route::get('logout','AuthController@logout');
    Route::resource('userinfo','UserInfoController');
    Route::get('count','CountController@count');
    Route::get('auth_user','AuthUserController@index');

    Route::get('report/{id}','ReportController@info');
    Route::get('activities/{id}','ActivitiesController@info');
    Route::get('information/{id}','InformationController@info');
    Route::get('about/{id}','AboutController@info');

    Route::post('report/{id}','ReportController@status');
    Route::post('activities/{id}','ActivitiesController@status');
    Route::post('information/{id}','InformationController@status');
    Route::post('about/{id}','AboutController@status');

    Route::group([
        'prefix'=>'user/{users}',
    ],function (){

        Route::post('report','ReportController@store');
        Route::post('activities','ActivitiesController@store');
        Route::post('information','InformationController@store');
        Route::post('about','AboutController@store');
    });
    Route::get('report','ReportController@index');
    Route::post('report/{id}/edit','ReportController@update');
    Route::post('report/{id}/delete','ReportController@destroy');

    Route::get('activities','ActivitiesController@index');
    Route::post('activities/{id}/edit','ActivitiesController@update');
    Route::post('activities/{id}/delete','ActivitiesController@destroy');

    Route::get('information','InformationController@index');
    Route::post('information/{id}/edit','InformationController@update');
    Route::post('information/{id}/delete','InformationController@destroy');

    Route::get('about','AboutController@index');
    Route::post('about/{id}/edit','AboutController@update');
    Route::post('about/{id}/delete','AboutController@destroy');


//    所有分类
    Route::get('sort_reports','SortReportController@index');
    Route::post('sort_reports','SortReportController@store');
    Route::post('sort_reports/{id}','SortReportController@destroy');

    Route::get('sort_activities','SortActivitiesController@index');
    Route::post('sort_activities','SortActivitiesController@store');
    Route::post('sort_activities/{id}','SortActivitiesController@destroy');

    Route::get('sort_information','SortInformationController@index');
    Route::post('sort_information','SortInformationController@store');
    Route::post('sort_information/{id}','SortInformationController@destroy');

    Route::get('sort_about','SortAboutController@index');
    Route::post('sort_about','SortAboutController@store');
    Route::post('sort_about/{id}','SortAboutController@destroy');

//所有标签
    Route::get('intag','IntagController@index');
    Route::post('intag','IntagController@store');
    Route::post('intag/{id}','IntagController@destroy');

    Route::get('retag','RetagController@index');
    Route::post('retag','RetagController@store');
    Route::post('retag/{id}','RetagController@destroy');

    Route::get('actag','ActagController@index');
    Route::post('actag','ActagController@store');
    Route::post('actag/{id}','ActagController@destroy');

    Route::get('abtag','AbtagController@index');
    Route::post('abtag','AbtagController@store');
    Route::post('abtag/{id}','AbtagController@destroy');

//配置网站
    Route::get('index_carousel','IndexCarouselController@index');
    Route::post('index_carousel','IndexCarouselController@store');
    Route::post('index_carousel/{id}','IndexCarouselController@destroy');

    Route::get('activities_carousel','ActivitiesCarouselController@index');
    Route::post('activities_carousel','ActivitiesCarouselController@store');
    Route::post('activities_carousel/{id}','ActivitiesCarouselController@destroy');

    Route::get('recommend','RecommendController@index');
    Route::post('recommend','RecommendController@store');
    Route::post('recommend/{id}','RecommendController@destroy');

    Route::post('website','WebsiteController@update');



    Route::group([
        'prefix'=>'user/{users}',
        'namespace'=>'User',
    ],function (){
        //文章评论
        Route::get('report_comments','ReportCommentController@index');
        Route::post('report_comments','ReportCommentController@store');
        Route::post('report_comments/{id}','ReportCommentController@destroy');

        Route::get('activities_comments','ActivitiesCommentController@index');
        Route::post('activities_comments','ActivitiesCommentController@store');
        Route::post('activities_comments/{id}','ActivitiesCommentController@destroy');

        Route::get('information_comments','InformationCommentController@index');
        Route::post('information_comments','InformationCommentController@store');
        Route::post('information_comments/{id}','InformationCommentController@destroy');


        Route::post('reportcollection/{report_id}','CollectionController@reportcollection');
        Route::post('activitiescollection/{activities_id}','CollectionController@activitiescollection');
        Route::post('informationcollection/{information_id}','CollectionController@informationcollection');
    });

});
Route::group([
    'namespace'=>'Web'
],function (){
    //首页分类的文章
    Route::get('web_index_report','WebReportIndexController@index');
    Route::get('web_index_information','WebInformationIndexController@index');
    Route::get('web_index_activities','WebActivitiesIndexController@index');
//该分类下最热门的文章
    Route::get('web_index_newreport','WebReportIndexController@newindex');
    Route::get('web_index_newinformation','WebInformationIndexController@newindex');
    Route::get('web_index_newactivities','WebActivitiesIndexController@newindex');
//全网最热门|最新
    Route::get('web_index_new','WebNewController@index');
    Route::get('web_index_hot','WebNewController@hot');
    Route::get('web_index_hottag','WebNewController@hottag');

//首页轮播图
    Route::get('web_index_carousel','WebIndexCarouselController@index');

//资讯
    Route::get('web_report','WebReportController@index');
    Route::get('web_information','WebInformationController@index');
    Route::get('web_activities','WebActivitiesController@index');
});


