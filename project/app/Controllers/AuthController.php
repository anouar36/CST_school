<?php
namespace app\Controllers;

require_once '../vendor/autoload.php';

use App\Controllers\View;
use App\Models\User;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as GoogleServiceOauth2;



class AuthController {
    private $config;

   

    public function login() {
        require 'app/views/auth/login.php';
    }

    public function register() {
        require 'app/views/auth/register.php';
    }
       
}
