<?php
namespace App\Repositories;

use Config\Database;
use Config\Session;
use Exception;
use PDOException;
use PDO;
class Auth {

    private $connexion;


    public function __construct() {
        $this->connexion = Database::getConnection();
    }


    public function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function BringRole($email) {
        $query = "SELECT * FROM users
        INNER JOIN roles ON users.role_id = roles.role_id
        WHERE email = :email";
        
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $userSession = new Session();
        $userSession->loginUser($user);
        
      
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

            $user = $this->BringRole($email);
            return  $user;

        }

       
    }


}