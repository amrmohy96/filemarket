<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('admin.index');
Route::get('/{file}', 'FileController@show')->name('admin.files.show');
Route::prefix('files')->group(function () {

    Route::prefix('new')->group(function () {
        Route::get('/', 'FileNewController@index')->name('admin.files.new.index');
        Route::patch('/{file}', 'FileNewController@update')->name('admin.files.new.update');
        Route::delete('/{file}', 'FileNewController@destroy')->name('admin.files.new.delete');

    });


    Route::prefix('updated')->group(function () {
        Route::get('/', 'FileUpdatedController@index')->name('admin.files.updated.index');
        Route::patch('/{file}', 'FileUpdatedController@update')->name('admin.files.updated.update');
        Route::delete('/{file}', 'FileUpdatedController@destroy')->name('admin.files.updated.delete');

    });
});


