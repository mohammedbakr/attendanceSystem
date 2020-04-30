<?php





Auth::routes(['register' => false]);

Route::redirect('/','dashboard');
//student login system
Route::GET('student/home', 'StudentController@index')->name('student.index');
Route::get('students/attendance/{student}', 'StudentController@showAttendance')->name('showattendance');
Route::post('students/attendance/{student}', 'StudentController@storeAttendance')->name('storeattendance');
Route::GET('student', 'Student\LoginController@showLoginForm')->name('student.login');
Route::POST('student','Student\LoginController@login');
Route::POST('student-password/email','Student\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::GET('student-password/reset','Student\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
Route::POST('student-password/reset','Student\ResetPasswordController@reset');
Route::GET('student-password/reset/{token}','Student\ResetPasswordController@showResetForm')->name('student.password');
// choose school
Route::post('student/home/{student}', 'StudentController@update')->name('students.update');

