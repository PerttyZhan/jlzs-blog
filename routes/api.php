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
    Route::post('sort_reports/{id}/edit','SortReportController@update');

    Route::get('sort_activities','SortActivitiesController@index');
    Route::post('sort_activities','SortActivitiesController@store');
    Route::post('sort_activities/{id}','SortActivitiesController@destroy');
    Route::post('sort_activities/{id}/edit','SortActivitiesController@update');

    Route::get('sort_information','SortInformationController@index');
    Route::post('sort_information','SortInformationController@store');
    Route::post('sort_information/{id}','SortInformationController@destroy');
    Route::post('sort_information/{id}/edit','SortInformationController@update');

    Route::get('sort_about','SortAboutController@index');
    Route::post('sort_about','SortAboutController@store');
    Route::post('sort_about/{id}','SortAboutController@destroy');
    Route::post('sort_about/{id}/edit','SortAboutController@update');

//所有标签
    Route::get('intag','IntagController@index');
    Route::post('intag','IntagController@store');
    Route::post('intag/{id}','IntagController@destroy');
    Route::post('intag/{id}/edit','IntagController@update');

    Route::get('retag','RetagController@index');
    Route::post('retag','RetagController@store');
    Route::post('retag/{id}','RetagController@destroy');
    Route::post('retag/{id}/edit','RetagController@update');

    Route::get('actag','ActagController@index');
    Route::post('actag','ActagController@store');
    Route::post('actag/{id}/edit','ActagController@update');
    Route::post('actag/{id}','ActagController@destroy');

    Route::get('abtag','AbtagController@index');
    Route::post('abtag','AbtagController@store');
    Route::post('abtag/{id}/edit','AbtagController@update');
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
//显示新闻
    Route::get('web','WebController@index');
    //显示具体某篇新闻的数据
    Route::get('web/{id}','WebController@show');
    //显示相关文章
    Route::get('web_about/{id}','WebController@about');

    //全局搜索

    Route::get('search_all','WebSearchController@index');
    Route::get('web_search','WebSearchController@search');

//分类接口
    Route::get('sort','SortController@index');
    //首页分类的文章
    Route::get('web_index','WebIndexController@index');
//全网最热门|最新
    Route::get('web_index_new','WebNewController@index');
    Route::get('web_index_hot','WebNewController@hot');
    Route::get('web_index_hottag','WebNewController@hottag');
//首页轮播图
    Route::get('web_carousel','WebCarouselController@index');
 //点赞
    Route::get('like/{id}','LikeController@like');
//生成签名
    Route::get('signature','SignatureController@getSignPackage');

    //第三方登录
    Route::get('auth/weixinlogin','AuthWeixinLoginController@weinxinlogin');
    Route::get('auth/weixin','AuthWeixinController@weixin');

    Route::get('auth/qqlogin','AuthQqLoginController@qqlogin');
    Route::get('auth/qq','AuthQqController@qq');



});


