<?php
namespace app\Controllers;
use App\Controllers\View;
use App\Repositories\Auth;
use Config\Session;
use App\Models\User;

class LoginController{
   

    public function index(){
        View::render('Auth/login.php', [
        ]);

    }

    public function login(){

        // CHECK REQUEST METHOD  AND VALUS  
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

       if (isset($_POST['email'])  && isset($_POST['password']) )
       {

        $loginUser=new Auth();
        $session=new Session();
        $user = $loginUser->store($_POST['email'],$_POST['password']);
        $session->loginUser( $user);
       
        

        if(!$user){
            return false ;
        }else{
            if($user['role_name']=='Admin'){
                
                header("Location:admin"); 
            }else if($user["role_name"]=='Teacher'){

                header("Location:teacher");
            }else{
                header("Location:student");
            }
            return true;
        }
        }else{
            return false;
        }
        }else {
            return false ;
        }
    }

    public function logout(){
        $session=new Session();
        $session->logoutUser();
        header("Location:login"); 
    }
}
// public fu
//     // private function loadView($viewName, $data = []) {
//     //     extract($data);
//     //     require_once __DIR__ . "/../../resources/Views/Auth/".$viewName.".php"; 
//     // }



