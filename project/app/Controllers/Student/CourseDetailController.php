<?php
namespace app\Controllers\Student;

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;



class CourseDetailController{

    public function index($id)
    {
        $course = new CoursRepositorie;
        $user = new UserRepositorie;
        $userDetail = $user->getUser($_SESSION['user_id']);
        $courseDetail = $course->getCourseById($id);

       
       
        View::render('Student/courseDetails.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            'course'=> $courseDetail,
            'user' => $userDetail,
        ]);
        
        



        

        
    }

    

}