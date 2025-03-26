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
Route::get('student/dashborad'  , 'Studentdashborad@index');

// block and unblock user
Route::get('unblock/user/{id}', 'AdminController@unblock');

Route::get('block/user/{id}', 'AdminController@block');

//save image
Route::post('admin/saveImage', 'AdminController@saveImage');
//Couers 
Route::get('admin/couers', 'CouersController@index');
// tages 
Route::get('admin/tags', 'TagsController@index');

// add tag
Route::post('admin/create/tage', 'TagsController@addTag');

// delete tag
Route::get('admin/deleteTag/{id}', 'TagsController@deleteTag');

// update tag
Route::post('admin/updateTag','TagsController@updateTag');




// auth google
 

// Route::get('auth/google', 'AuthController@googleLogin');
// Route::get('auth/google/callback', 'AuthController@googleCallback');








