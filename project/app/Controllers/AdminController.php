<?php
namespace app\Controllers;
use App\Controllers\View;
use App\Models\User;
use App\Repositories\CoursRepositorie;


class AdminController{

    public function index(){
        $Courses = new CoursRepositorie;
        $numberCourses  = $Courses->clculeRows();
        $allcourses = $Courses->allCoures();
       

        View::render('Admin/admin.twig', [
            'allCOURSES'=> $allcourses,
            'numberCourses'=> $numberCourses['COUNT(*)'],
        ]);

    }
}