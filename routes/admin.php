<?php

Route::get('admin/login', 'AdminAuthController@getLogin')->name('getLogin')->middleware('guest');
Route::post('admin/login', 'AdminAuthController@postLogin')->name('postLogin');
Route::get('admin/logout', 'AdminAuthController@logout')->name('logout');

Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', 'AdminHomeController@index')->name('home.dashboard');
    Route::get('test', 'AdminHomeController@test')->name('home.test');

    Route::get('account', 'AdminAccountController@index')->name('account.getList');
    Route::get('account/getCreate', 'AdminAccountController@getCreate')->name('account.getCreate');
    Route::post('account/getCreate', 'AdminAccountController@postCreate')->name('account.postCreate');
});

