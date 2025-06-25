<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
   Route::get('/', 'MainController@index')->name('admin.index');
   Route::get('/media', 'MediaController@index')->name('admin.media.index');
});
