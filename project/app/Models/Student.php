<?
namespace App\Models;




class Student {

    public $user_id;
    public $username;
    public $password;
    public $role_id;
    public $email;  
    public $is_active;
    public $image;
    public $is_Block;

   public function __construct($user_id, $username, $password, $role_id, $email, $is_active, $image, $is_Block) {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->email = $email;
        $this->is_active = $is_active;
        $this->image = $image;
        $this->is_Block = $is_Block;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getName() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function getImage() {
        return $this->image;
    }

    public function getIsBlock() {
        return $this->is_Block;
    }

    
    
    
}