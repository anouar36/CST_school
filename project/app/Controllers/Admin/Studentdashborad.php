<?php
namespace app\Controllers;
use App\Controllers\View;
// use App\Models\User;


class Studentdashborad{

    public function index(){
       
        View::render('Admin/StudentDashborad.twig', [
           
        ]);

    }
}