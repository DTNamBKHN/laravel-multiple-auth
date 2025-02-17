<?php
Route::view('/', 'app', ['data' => []]);
Auth::routes();

Route::get('/login/professor', 'Auth\LoginController@showProfessorLoginForm')->name('login.professor');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm')->name('login.student');
Route::get('/register/professor', 'Auth\RegisterController@showProfessorRegisterForm')->name('register.professor');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm')->name('register.student');

Route::post('/login/professor', 'Auth\LoginController@professorLogin');
Route::post('/login/student', 'Auth\LoginController@studentLogin');
Route::post('/register/professor', 'Auth\RegisterController@createProfessor')->name('register.professor');
Route::post('/register/student', 'Auth\RegisterController@createStudent')->name('register.student');

Route::get('/admin', function(){
    return view('app', ['data' => [Auth::guard('web')->check()]]);
})->middleware('auth:web');

Route::get('/professor', 'ProfessorController@index')->middleware('auth:professor');

// Route::view('/admin', 'app', ['data' => []]);
// Route::view('/home', 'home')->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {
//     Route::view('/admin', 'app', ['data' => []]);
// });

// Route::group(['middleware' => 'auth:professor'], function () {
//     Route::view('/professor', 'professor');
// });

// Route::group(['middleware' => 'auth:student'], function () {
//     Route::view('/student', 'student');
// });
