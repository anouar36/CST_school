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


    public function __construct($name, $email=null, $password=null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId($id)
    {
        $this->id = $id;
    }

    public function getname($name)
    {
        $this->name = $name;
    }

    public function getEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword($password)
    {
        $this->password = $password;
    }



    public function setId()
    {
        return $this->id;
    }

    public function setname()
    {
        return $this->name;
    }

    public function setEmail()
    {
        return $this->email;
    }

    public function setPassword()
    {
        return $this->password;
    }







}