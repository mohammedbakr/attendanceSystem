<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //student routes
            Route::resource('students', 'StudentController')->except(['show']);


            //stage routes
            Route::resource('stages', 'StageController')->except(['show']);

            //school routes
            Route::resource('schools', 'SchoolController')->except(['show']);

            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

     
            //user routes
            Route::resource('users', 'UserController')->except(['show']);

        });//end of dashboard routes
    });


