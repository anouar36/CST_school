<?php
namespace app\Controllers;
session_start();

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;


class StudentController{

    public function index($number = 1){
        

        $allCourses = new CoursRepositorie;
        $nuberPages = $this->pagenation();
        $Ofset = $this->getPageNumber($number);
        var_dump($_SESSION['role']);
       

        $courses = $allCourses->index( $Ofset);

        // var_dump($courses);
        
        View::render('Student/student.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            'allCOURSES'=> $courses,
            'totalPages'=> $nuberPages,
            'currentPage'=> $number,
        ]);
    }

    

    public function pagenation(){
        $nmberPages= new CoursRepositorie();
        $totalePges = $nmberPages->clculeRows();
        $NumPages= ceil($totalePges['COUNT(*)']/6);
        if(!$NumPages){
            return false;
        }else{
            return $NumPages;
        }  
    }


    public function getPageNumber($currentPage){
        if($currentPage==1){
            $numberRowdesolay = 1;
            return $numberRowdesolay;
        }elseif($currentPage>1){
            $num = $currentPage - 1;
            $numFp=6;
            $numberFodesolay=$numFp*$num;
            return $numberFodesolay;
        }
    }

    public function allCourses(){
        
        
    }



}