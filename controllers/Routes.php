<?php

use Http\Route;



Route::get('/', 'NewsController@home');
Route::get('photo', 'NewsController@index');
Route::get('photo/create', 'NewsController@create');
Route::get('photo/{id}', 'NewsController@create');
Route::get('photo/{photo}', 'NewsController@show');
Route::get('photo/{photo}/{asd}', 'NewsController@show');
Route::get('photo/{photo}/edit', 'NewsController@edit');
Route::get('abbas', function () {
    echo 'Hi Anonymous Function';
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'NewsController@home');
    Route::get('photo', 'NewsController@index');
    Route::get('photo/create', 'NewsController@create');
    Route::get('photo/create/{id}', 'NewsController@create');
    Route::get('photo/{photo}', 'NewsController@show');
    Route::get('photo/{photo}/{asd}', 'NewsController@show');
    Route::get('photo/{photo}/edit', 'NewsController@edit');
});



Route::group(['prefix' => 'fa'], function () {
//    \Library\AppClass::setLocal('en');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'NewsController@home');
        Route::get('categories', 'CategoryController@index');
        Route::get('photo/create', 'NewsController@create');
        Route::get('photo/create/{id}', 'NewsController@create');
        Route::get('photo/{photo}', 'NewsController@show');
        Route::get('photo/{photo}/{asd}', 'NewsController@show');
        Route::get('photo/{photo}/edit', 'NewsController@edit');
    });

});