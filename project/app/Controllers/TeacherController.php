<?php
namespace app\Controllers;
use App\Controllers\View;
use App\Models\User;



class TeacherController{

    public function index(){

        
        View::render('Teacher/teacher.php', [
            
        ]);

    }
}