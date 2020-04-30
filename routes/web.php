<?php





Auth::routes(['register' => false]);

Route::redirect('/','dashboard');
//student login system
Route::GET('student/home', 'StudentController@index')->name('student.index');
Route::get('students/attendance/{student}', 'StudentController@showAttendance')->name('showattendance');
Route::post('students/attendance/{student}', 'StudentController@storeAttendance')->name('storeattendance');
Route::GET('student', 'Student\LoginController@showLoginForm')->name('student.login');
Route::POST('student','Student\LoginController@login');

// choose school
Route::post('student/home/{student}', 'StudentController@update')->name('students.update');

