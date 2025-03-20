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

    public function block($id){
        try {
            $query = $this->connexion->prepare("UPDATE users SET is_active = 0 WHERE user_id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function unblock($id){
        try {
            $query = $this->connexion->prepare("UPDATE users SET is_active = 1 WHERE user_id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    
  
}