<?php
require_once "../vendor/autoload.php";
use Src\Http\Route ;

// exemple 
Route::get('', 'HomeController@index');

Route::get('home', 'HomeController@index');


// auth 
Route::get('login', 'LoginController@index');
Route::get('SignUp', 'SignUpController@index');

Route::post('SignUpUser', 'SignUpController@create');
Route::post('Login', 'loginController@login');


//page User  
Route::get('student/{id}', 'StudentController@index');
Route::get('student', 'StudentController@index');
Route::get('teacher', 'TeacherController@index');


//PAGES OF ADMIN 
Route::get('admin'  , 'AdminController@index');
Route::get('/student/dashborad'  , 'Studentdashborad@index');
// block an unblock user
Route::get('/admin/block/{id}'  , 'AdminController@block');
Route::get('/admin/unblock/{id}'  , 'AdminController@unblock');

// auth google

Route::get('auth/google', 'AuthController@googleLogin');
Route::get('auth/google/callback', 'AuthController@googleCallback');







