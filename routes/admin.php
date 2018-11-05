<?php

Route::get('admin/login', 'AuthAdminController@getLogin')->name('getLogin');

Route::get('admin/dashboard', 'AdminHomeController@dashboard');
