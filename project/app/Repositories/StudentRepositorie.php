<?php
namespace App\Repositories;

use Config\Database;

use Exception;
use PDOException;
use PDO;
class StudentRepositorie {

    private $connexion;


    public function __construct() {
        $this->connexion = Database::getConnection();
    }


    
    public function getUser() {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user);
        exit;

        // return object Usre;
    }

    public function BringRole($email) {
        $query = "SELECT roles.role_name FROM users
        INNER JOIN roles ON users.role_id = roles.role_id
        WHERE email = :email";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ;
    }

    public function passwordExists($password) {
        $query = "SELECT COUNT(*) FROM users WHERE password = :password";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    


    private function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    public function addMember($username, $email, $password, $role) {

        if ($this->emailExists($email)){
            throw new \Exception("Un compte avec cette email existe déja");
        }

        $hashedPassword = $this->hashPassword($password);
        $query = "INSERT INTO users (username, email, password,role_id)
        VALUES (:username,:email, :password, :role );";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role ,PDO::PARAM_INT);
        $insertResults = $stmt->execute();
        return $insertResults;
    }

    public function store($email, $password) {

        if (!$this->emailExists($email) && $this->passwordExists($email)){
            throw new \Exception("Un compte avec cette email not existe ");
        } else{

          

            $role = $this->BringRole($email);
            return  $role['role_name'] ;
        }

       
    }


}