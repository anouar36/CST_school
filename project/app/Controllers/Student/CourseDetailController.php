<?php
namespace app\Controllers\Student;

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;
use App\Service\CouersServis;



class CourseDetailController{

    public function index($id)
    {
        $course = new CoursRepositorie;
        $user = new UserRepositorie;
        $CouersServis = new  CouersServis;
        $userDetail = $user->getUser($_SESSION['user_id']);
        $courseDetail = $course->getCourseById($id);
        $interaction = $course->interaction($_SESSION['user_id'],$id);
        $revuse = $course->reviews($id);
      
        $assessment = $course->getAssessment($id);
        
        View::render('Student/courseDetails.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            'course'=> $courseDetail,
            'user' => $userDetail,
            'interaction' => $interaction,
            'reviews' => $revuse,
            'assessment' => $assessment,

        ]);
    }
    public function like()
    {
        $like = new CoursRepositorie;

        $id = $_POST['courseId'];
        $userId = $_SESSION['user_id'];
        $islike = $_POST['islike'];


       if($islike == 0){
        $true=1;
        $like->like($id, $userId,$true);

       }else{
        $false =0;
        $like->like($id, $userId,$false);
       }
         header('Location: /course/details/'.$id);
         exit;              

    }

    public function exercies($id)
    {
    
        

    }


    

}