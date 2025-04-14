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
        $allcourses = $Courses->index(6);

        var_dump("admin");
    
        View::render('Admin/admin.twig', [
            'allCOURSES'=> $allcourses,
            'numberCourses'=> $numberCourses['COUNT(*)'],
            'users' => $allUsers,
            'user' =>$user,
    
        ]);
    }

    public function getUser($id){
        $user = new UserRepositorie;
        $userDetail = $user->getUser($id);
        if ($userDetail) {
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'id' => $id,
                    'name' => $userDetail->getName(),
                    'email' => $userDetail->getEmail(),
                    'password' => $userDetail->getPassword(),
                    'active' => $userDetail->getIsActive(),
                    'image' => $userDetail->getImage(),
                    'isblock' => $userDetail->getIsBlock()
                ]
            ]);
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
    }


    public function block(){
        $id= $this->id($_GET['url']);
        
        $user = new UserRepositorie;
        $resulte = $user->block($id);

        if($resulte){
            return json_encode([
                'status' => 'success',
                'message' => 'User blocked successfully'
            ]);
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to block user'
            ]);
        }

        
    }

    public function unblock(){
        $id= $this->id($_GET['url']);
        
        $user = new UserRepositorie;
        $resulte =  $user->unblock($id);
      
        header('Content-Type: application/json');
        return json_encode($resulte);
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


    public function searchUsers($query)
    {
        $userRepositorie = new UserRepositorie();
        $user = $userRepositorie->getUser($_SESSION['user_id']);
        $users = $userRepositorie->searchUsers($query);
           // Convert $users to an array if it's an object
        $usersArray = [];
        foreach ($users as $u) {
            $usersArray[] = [
                'id' => $u->getId(),
                'name' => $u->getName(),
                'email' => $u->getEmail(),
                'password' => $u->getPassword(),
                'isActive' => $u->getIsActive(),
                'is_block' => $u->getIsBlock(),
                'image' => $u->getImage(),
            ];
            
        }
    
    // Convert the array to JSON
    echo json_encode($usersArray);
        // var_dump($users);

        return   $usersArray;
    }

}