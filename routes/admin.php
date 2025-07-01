<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
   Route::get('/', 'MainController@index')->name('admin.index');

   /* Media */
   Route::get('/media', 'MediaController@index')->name('admin.media.index');
   Route::get('/media/create', 'MediaController@create')->name('admin.media.create');
   Route::post('/media/store', 'MediaController@store')->name('admin.media.store');
   /* ... */
});
