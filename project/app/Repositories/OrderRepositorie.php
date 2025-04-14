<?php
namespace App\Repositories;


use Config\Database;
use App\Models\Coures;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Tags;

use Exception;
use PDOException;
use PDO;
class OrderRepositorie
{

    private $connexion;


    public function __construct()
    {
        $this->connexion = Database::getConnection();
    }

    public function store($iduser , $idcour , $idorder)
    {

        $query = "INSERT INTO orders (user_id, course_id, orderkey) VALUES (:user_id, :course_id, :orderkey)";
            $stmt = $this->connexion->prepare($query);
            $stmt->bindParam('user_id', $iduser, PDO::PARAM_INT);
            $stmt->bindParam('course_id', $idcour, PDO::PARAM_STR);
            $stmt->bindParam('orderkey', $idorder, PDO::PARAM_STR);

            $resulte = $stmt->execute();
            if(!$resulte){
                return false;
            }else{
                var_dump('hhhhh anwar');
                return true ;
            }


    }
}

// this for tmorrow

