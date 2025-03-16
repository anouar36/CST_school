<?php
namespace App\Repositories;
session_start();

use Config\Database;

use Exception;
use PDOException;
use PDO;
class UserRepositorie {

    private $connexion;


    public function __construct() {
        $this->connexion = Database::getConnection();
    }


    
  
}