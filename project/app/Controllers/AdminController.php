<?php
namespace app\Controllers;
session_start();    


use App\Controllers\View;
use App\Repositories\CoursRepositorie;
use App\Repositories\UserRepositorie;


class AdminController{

    public function index(){
        $Courses = new CoursRepositorie;
        $user = new UserRepositorie;
        
        $Users = $user->index();
        $numberCourses  = $Courses->clculeRows();
        $allcourses = $Courses->allCoures();



        foreach($Users as  $user){

            var_dump($user->getId());
           
        }

        


        // var_dump($Users[0]->getName());
        // var_dump($Users[0]->getEmail());
        
       

        View::render('Admin/admin.twig', [
            'allCOURSES'=> $allcourses,
            'numberCourses'=> $numberCourses['COUNT(*)'],
            'users' => $Users,
            'user' => $_SESSION['user_name'],

        ]);

    }

    public function block($id){
        $user = new UserRepositorie;
        $user->block($id);
        header('Location: /admin');
    }

    public function unblock($id){
        $user = new UserRepositorie;
        $user->unblock($id);
        header('Location: /admin');
    }
}