<?php
namespace app\Controllers;

require_once '../vendor/autoload.php';

use App\Controllers\View;
use App\Models\User;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as GoogleServiceOauth2;



class CourseController {
    private $config;


    public function index() {
        $query = "SELECT * FROM courses";
        
        $stmt = $this->connexion->prepare($query);
        
        $stmt->execute();
        
        $courses = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        // Return the array of objects
        return $courses;
    }
    

}
