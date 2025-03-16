<?php
namespace app\Controllers;
use App\Controllers\View;
use App\Models\User;


class SignUpController{

    public function index(){
        View::render('Auth/SignUp.php', [
        ]);

    }

    public function create(){

             // CHECK REQUEST METHOD  AND VALUS  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['fullname']) 
            && isset($_POST['email'])  
            && isset($_POST['password'])  
            && isset($_POST['confirm_password'])  
            && isset($_POST['role']))
            {
               
                 // CHECK PASSWORD ==  CONFIRM PASSWORD'

                if($_POST['password']===$_POST['confirm_password']){
                    $RegesterUser = new User();
                    $RegesterUser->addMember($_POST['fullname'],$_POST['email'],$_POST['password'],$_POST['role']);
                    
                    // $create = User::create();

                    if(!$RegesterUser){
                        return false ;
                    }else{
                        header("Location: login"); // Change 'success.php' to your target page
                        return true;

                    }
                }else{
                    return false;
                }
            }else {
                return false ;
            }
        }else{

        }
      }
       
    }


    // private function loadView($viewName, $data = []) {
    //     extract($data);
    //     require_once __DIR__ . "/../../resources/Views/Auth/".$viewName.".php"; 
    // }



