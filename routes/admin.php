<?php

Route::get('admin/login', 'AdminAuthController@getLogin')->name('getLogin');
Route::post('admin/login', 'AdminAuthController@postLogin')->name('postLogin');
Route::get('admin/logout', 'AdminAuthController@logout')->name('logout');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/dashboard', 'AdminHomeController@index')->name('home.dashboard');
    Route::get('admin/test', 'AdminHomeController@test')->name('home.test');

    Route::get('admin/account', 'AdminAccountController@index')->name('account.getList');
    Route::get('admin/account/getCreate', 'AdminAccountController@getCreate')->name('account.getCreate');
    Route::post('admin/account/getCreate', 'AdminAccountController@postCreate')->name('account.postCreate');
});

