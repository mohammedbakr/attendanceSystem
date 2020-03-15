<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //stage routes
            Route::resource('stages', 'StageController')->except(['show']);

            //school routes
            Route::resource('schools', 'schoolController')->except(['show']);

            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            //order routes
            Route::resource('orders', 'OrderController');
            Route::get('/orders/{order}/schools', 'OrderController@schools')->name('orders.schools');


            //user routes
            Route::resource('users', 'UserController')->except(['show']);

        });//end of dashboard routes
    });


