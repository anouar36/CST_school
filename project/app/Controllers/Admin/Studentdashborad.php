<?php
namespace app\Controllers;
use App\Controllers\View;
// use App\Models\User;


class Studentdashborad{

    public function index(){
        var_dump($_SESSION['role']);
        var_dump("anwar");
       
        View::render('Admin/StudentDashborad.twig', [
           
        ]);

    }
}