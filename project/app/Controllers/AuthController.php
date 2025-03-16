<?php
namespace app\Controllers;

require_once '../vendor/autoload.php';

use App\Controllers\View;
use App\Models\User;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as GoogleServiceOauth2;



class AuthController {
    private $config;

    public function __construct() {
        $this->config = require __DIR__.'/../Config.php';
    }

    public function login() {
        require 'app/views/auth/login.php';
    }

    public function register() {
        require 'app/views/auth/register.php';
    }

    public function googleLogin() {
       
        $googleConfig = $this->config['google']['web'] ?? null;
        if (!$googleConfig) {
            die("Error: Google OAuth config is missing");
        }

        $client = new GoogleClient();
        $client->setClientId($googleConfig['client_id']);
        $client->setClientSecret($googleConfig['client_secret']);
        $client->setRedirectUri($googleConfig['redirect_uris'][0]); 
    
        $client->addScope("email");
        $client->addScope("profile");
    
        $auth_url = $client->createAuthUrl();
        // var_dump($auth_url);
        // exit;
       
        header("Location: $auth_url");
        exit();
    }
    
    public function googleCallback() {
        $googleConfig = $this->config['google']['web'] ?? null;
    
        if (!$googleConfig) {
            die("Error: Google OAuth config is missing");
        }
    
        $client = new GoogleClient();
        $client->setClientId($googleConfig['client_id']);
        $client->setClientSecret($googleConfig['client_secret']);
        $client->setRedirectUri($googleConfig['redirect_uris'][0]); 
    
        if (!isset($_GET['code'])) {
            die('Error: Missing authorization code');
        }
    
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (isset($token['error'])) {
            die('Error fetching access token: ' . $token['error']);
        }
    
        $client->setAccessToken($token);
        $oauth = new GoogleServiceOauth2($client);
        $user_info = $oauth->userinfo->get();
    
        session_start();
        $_SESSION['user'] = [
            'id' => $user_info->id,
            'name' => $user_info->name,
            'email' => $user_info->email,
            'picture' => $user_info->picture,
        ];
    
        header("Location:student");
        exit();
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit();
    }
}
