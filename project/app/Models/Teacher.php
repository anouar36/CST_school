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
    private $image;


    public function __construct($name = null, $email = null, $password = null, $image = null,)
    {
        $this->id = null; 
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
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

    public function getImage()
    {
        return $this->image;
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

    

    public function setImage($image)
    {
        $this->image = $image;
    }

}