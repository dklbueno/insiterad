<?php

//Route::group(['middleware'=>['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/verifylogin', 'HomeController@verifylogin')->name('verifylogin');
    Route::get('/calculo', 'CalculoController@index')->name('calculo');
    Route::post('/calculo/store', 'CalculoController@store')->name('calculo.store');
    Route::get('/calculo/list', 'CalculoController@list')->name('calculo.list');
    Route::get('/calculo/delete/{id}', 'CalculoController@delete')->name('calculo_delete');
//});

Auth::routes();
