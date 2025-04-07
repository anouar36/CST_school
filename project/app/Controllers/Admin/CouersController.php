<?php 
namespace App\Controllers\Admin;


use App\Controllers\View;
use App\Repositories\CoursRepositorie;
use App\Repositories\UserRepositorie;
use App\Repositories\Auth;


if ( $_SESSION['role'] !== 'Admin') {
    die('خطأ: ليس لديك الصلاحية لتنفيذ هذا الإجراء');
}

class CouersController {

    public function index(){
        $Courses = new CoursRepositorie;
        $user = new UserRepositorie;
        $allUsers = $user->index();
        $user = $user->getUser($_SESSION['user_id']);
        $numberCourses  = $Courses->clculeRows();
        $allcourses = $Courses->allCoures();

      
       
        View::render('Admin/couers.twig', [
            'couerses'=> $allcourses,
            'numberCourses'=> $numberCourses['COUNT(*)'],
            'users' => $allUsers,
            'user' =>$user,
    
        ]);

    }
}