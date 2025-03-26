<?php
namespace App\Controllers\Admin;

use App\Controllers\View;
use App\Repositories\CoursRepositorie;
use App\Repositories\UserRepositorie;
use App\Repositories\Auth;



if ( $_SESSION['role'] !== 'Admin') {
    die('خطأ: ليس لديك الصلاحية لتنفيذ هذا الإجراء');
}


class AdminController{

    public function index(){
        $Courses = new CoursRepositorie;
        $user = new UserRepositorie;
        $allUsers = $user->index();
        $user = $user->getUser($_SESSION['user_id']);
        $numberCourses  = $Courses->clculeRows();
        $allcourses = $Courses->allCoures();

        var_dump("admin");
    
        View::render('Admin/admin.twig', [
            'allCOURSES'=> $allcourses,
            'numberCourses'=> $numberCourses['COUNT(*)'],
            'users' => $allUsers,
            'user' =>$user,
    
        ]);
    }

    public function block(){
        $id= $this->id($_GET['url']);
        
        $user = new UserRepositorie;
        $resulte = $user->block($id);
        header('Location:http://localhost:82/admin');
    }

    public function unblock(){
        $id= $this->id($_GET['url']);
        
        $user = new UserRepositorie;
        $resulte =  $user->unblock($id);
      
        header('Location:http://localhost:82/admin');
    }
    public function id($url){
        $segments = explode('/', $url);
        $id = end($segments);
        $id = (int) $id;
        return $id;
    }

    public function saveImage(){
        $file_name = $_FILES['image']['name'];
        $tempname= $_FILES['image']['tmp_name'];
        $folder = __DIR__."/../../../public/assets/images/".$file_name;
        $user = new UserRepositorie;
        if($_SESSION['image'] == NULL){
            $imagePath = $user->saveImage($file_name);
        }else{
             $imagePath = $user->UpdateImage($file_name,$_SESSION['user_id']);
        }
        $imagePath = $user->saveImage($file_name);

        if(move_uploaded_file($tempname, $folder)&& $imagePath){
            header('Location:http://localhost:82/admin');
        }else{
            echo "<h1>Failed to upload image</h1>";
        }   
            
        return $imagePath;
    }
}