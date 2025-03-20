<?php
namespace App\Models;
use Config\Database;
use Exception;
use PDOException;
use PDO;
class User
{

    private $id;
    private $name;
    private $email;
    private $password;

    private $isActive;

    private $is_block;

    private $image;

    public function __construct($id, $name, $email, $password, $isActive, $image, $is_block)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->isActive = $isActive;
        $this->image = $image;
        $this->is_block = $is_block;
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
    
    public function getId()
    {
        return $this->id;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function getIsBlock()
    {
        return $this->is_block;
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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function setIsBlock($is_block)
    {
        $this->is_block = $is_block;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }



    
}