<?php
namespace Config;



class Session
{
    function loginUser($user) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role_name'];
        $_SESSION['is_active'] = $user['is_active'];
        $_SESSION['is_Block'] = $user['is_Block'];
        $_SESSION['image'] = $user['image'];
        $_SESSION['logged_in'] = true;
    }
    
    function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    function logoutUser() {
        session_destroy();
        header("Location: login.php");
        exit();
    }
    
    function protectPage() {
        if (!isLoggedIn()) {
            header("Location: login.php");
            exit();
        }
    }
    
    
}
