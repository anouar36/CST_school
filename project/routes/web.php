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
Route::get('logout', 'LoginController@logout');


//page User  
Route::get('student/{id}', 'StudentController@index');
Route::get('student', 'StudentController@index');
Route::post('student', 'StudentController@index');
Route::get('teacher', 'TeacherController@index');


//PAGES OF ADMIN 
Route::get('admin'  , 'AdminController@index');
Route::get('get/user/{id}', 'AdminController@getUser');
// Route::get('student/dashborad'  , 'Studentdashborad@index');

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


// serch user
Route::get('/search/users/{id}', 'AdminController@searchUsers');

// course-detail
Route::get('course/details/{id}', 'CourseDetailController@index');

// payment
Route::get('payment/{id}', 'PaymentController@index');

// search student cours
Route::get('/search/student/cours/{query}', 'StudentController@searchCourse');

// history student 
Route::post('student/profile', 'StudentController@profile');

// verifyPayment
Route::post('/verifyPayment', 'PaymentController@verifyPayment');
// Route::get('verifyPayment', 'PaymentController@verifyPayment');

// /student/resources
Route::get('student/resources', 'StudentController@resources');
// /student/exercies
Route::get('/student/exercies/{id}', action: 'ExerciesController@indexWith');
// /like/
Route::post('/like', 'CourseDetailController@like');
// quizzes
Route::get('/student/quizz/{id}', 'QuizzesController@indexWith');
Route::post('/student/quizz', 'QuizzesController@index');
// /student/addReview
Route::post('/student/addReview', 'CourseDetailController@addReview');






// auth google
 

// Route::get('auth/google', 'AuthController@googleLogin');
// Route::get('auth/google/callback', 'AuthController@googleCallback');








