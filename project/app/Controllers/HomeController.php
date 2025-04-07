<?php  
namespace app\Controllers;
use App\Controllers\View;



class HomeController {
    public function index(){
        View::render('Home.php', [
        ]);

        // header("location: home");c:\Users\Youcode\Desktop\airBNB\project\app\Controllers\View.php
    }
}