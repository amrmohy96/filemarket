<?php

use Illuminate\Support\Facades\Route;

Route::get('/s',function (){
   dd(session('stripe_token'));
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/connect', 'Profile\Marketplace\MarketplaceConnectController@index')
    ->name('profile.connect');

Route::get('/profile/connect/complete', 'Profile\Marketplace\MarketplaceConnectController@store')
    ->name('profile.complete');
Route::namespace('Profile')
    ->prefix('profile')
    ->middleware(['auth','connect'])
    ->group(function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::prefix('files')
            ->namespace('File')
            ->group(function () {
                Route::get('/', 'FileController@index')->name('files');
                Route::get('/create', 'FileController@create')->name('files.create.after');
                Route::get('/{file}/create', 'FileController@create')->name('files.create.before');
                Route::get('/{file}/edit', 'FileController@edit')->name('files.edit');
                Route::patch('/{file}', 'FileController@update')->name('files.update');
                Route::post('/{file}', 'FileController@store')->name('files.store');
            });
    });
Route::post('/{file}/upload','Upload\UploadController@store')->name('upload.store');
Route::delete('/{file}/upload/{upload}','Upload\UploadController@destroy')->name('upload.destroy');


Route::get('/{file}','Files\FileController@show')->name('files.show');
Route::get('/{file}/{sale}/download','Files\FileDownloadController@show')->name('files.downloads');

Route::namespace('Checkout')
    ->prefix('/{file}/checkout')
    ->group(function (){
        Route::post('/free','CheckoutController@free')
            ->name('checkout.free');

        Route::post('/payment','CheckoutController@payment')
            ->name('checkout.payment');
    });
