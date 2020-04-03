<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.welcome');
});

Auth::routes(['register' => false]);

//student login system
Route::GET('student/home', 'StudentController@index');
Route::GET('student', 'Student\LoginController@showLoginForm')->name('student.login');
Route::POST('student','Student\LoginController@login');
Route::POST('student-password/email','Student\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::GET('student-password/reset','Student\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
Route::POST('student-password/reset','Student\ResetPasswordController@reset');
Route::GET('student-password/reset/{token}','Student\ResetPasswordController@showResetForm')->name('student.password');

Route::GET('test', 'StudentController@log');

 
Route::GET('/home', 'HomeController@index')->name('home');
