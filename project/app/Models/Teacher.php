<?php
namespace App\Models;
use Config\Database;
use Exception;
use PDOException;
use PDO;
class Teacher
{

    private $id;
    private $name;
    private $email;
    private $password;


    public function __construct($name = null, $email = null, $password = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }



    



}