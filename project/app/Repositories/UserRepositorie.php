<?php
namespace App\Repositories;


use Config\Database;

use Exception;
use PDOException;
use PDO;
use App\Models\User;
class UserRepositorie {

    private $connexion;


    public function __construct() {
        $this->connexion = Database::getConnection();
    }

    public function index(){
        try {
            $query = $this->connexion->prepare("SELECT * FROM users");
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_OBJ);
            // var_dump($users[0]);
            // exit;

            $Users = [];

            foreach ($users as $user) {
                $Users[] = new User($user->user_id, $user->username, $user->email, $user->password, $user->is_active, $user->image,$user->is_Block);
            }
            // var_dump($Users);
            return $Users;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getUser($id){
        try {
            $query = $this->connexion->prepare("SELECT * FROM users WHERE user_id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_OBJ);
            return new User($user->user_id, $user->username, $user->email, $user->password, $user->is_active, $user->image,$user->is_Block);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }



    public function block($id){
        try {
            $sql = "UPDATE users SET is_Block = 0 WHERE user_id = :id ";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $result=$stmt->execute();
            if ($result) {
                return true ;
            } else {
                return false ;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function unblock($id){
        try {
            $sql = "UPDATE users SET is_Block = 1 WHERE user_id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $result=$stmt->execute();
            if ($result) {
                return true ;
            } else {
                return false ;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function saveImage($image){
        try {
            $sql = "UPDATE users SET image = :image WHERE user_id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $result=$stmt->execute();
            if ($result) {
                return true ;
            } else {
                return false ;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateImage($image,$id){
        try {
            $sql = "UPDATE users SET image = :image WHERE user_id = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $id);
            $result=$stmt->execute();
            if ($result) {
                return true ;
            } else {
                return false ;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function searchUsers($query) {
      
        try {
            $sql = "SELECT * FROM users WHERE username LIKE :query OR email LIKE :query";
            $stmt = $this->connexion->prepare($sql);
            $searchQuery = "%$query%";
            $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_OBJ);

            $Users = [];

            foreach ($users as $user) {
                $Users[] = new User($user->user_id, $user->username, $user->email, $user->password, $user->is_active, $user->image,$user->is_Block);
            }
            
            return $Users;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    
  
}