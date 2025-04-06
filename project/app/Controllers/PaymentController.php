<?php
namespace app\Controllers;

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;



class PaymentController{

    public function index($id){

       

        $user = new UserRepositorie;
        $userDetail = $user->getUserById($_SESSION['user_id']);
        $course = new CoursRepositorie;
        $courseDetail = $course->getCourseById($id);


        
        View::render('auth/payment.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            'course'=> $courseDetail,
            'user' => $userDetail,
        ]);


    }

}