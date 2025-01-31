<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //student routes
            Route::resource('students', 'StudentController');
            Route::post('students/degrees', 'StudentController@addDegree')->name('addDegree');

            //majors
            Route::get('students/majors/postgraduate', 'StudentController@postgraduate')->name('postgraduate');
            Route::get('students/majors/diploma', 'StudentController@diploma')->name('diploma');
            Route::get('students/majors/general3', 'StudentController@general3')->name('general3');
            Route::get('students/majors/general4', 'StudentController@general4')->name('general4');
            Route::get('students/majors/primary3', 'StudentController@primary3')->name('primary3');
            Route::get('students/majors/primary4', 'StudentController@primary4')->name('primary4');
            Route::get('students/majors/kg1', 'StudentController@kg1')->name('kg1');
            Route::get('students/majors/kg3', 'StudentController@kg3')->name('kg3');
            Route::get('students/majors/kg4', 'StudentController@kg4')->name('kg4');
            Route::get('students/majors/notenrolled', 'StudentController@notenrolled')->name('notenrolled');
            Route::get('students/attendance/{student}', 'StudentController@showAttendance')->name('showattendance');
            Route::get('students/degrees/{student}', 'StudentController@showDegrees')->name('showdegrees');


            //user routes
            Route::resource('users', 'UserController');

            //schools routes
            Route::resource('schools', 'SchoolController');
            Route::get('schools/agent/create/{school}', 'SchoolController@getAgent')->name('getAgent');
            Route::put('schools/agent/create/{school}', 'SchoolController@addAgent')->name('addAgent');

            //excel routes
            Route::get('dashboard/students/majors/diploma/export', 'StudentController@export')->name('export');
            Route::get('importExportView', 'StudentController@importExportView');
            Route::post('import', 'StudentController@import')->name('import');
        });//end of dashboard routes
    });


