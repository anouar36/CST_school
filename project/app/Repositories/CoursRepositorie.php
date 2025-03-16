<?php
namespace App\Repositories;


use Config\Database;
use App\Models\Coures;
use App\Models\Category;
use App\Models\Teacher;

use Exception;
use PDOException;
use PDO;
class CoursRepositorie
{

    private $connexion;


    public function __construct()
    {
        $this->connexion = Database::getConnection();
    }
    public function index($numberFodesolay)
    {
        $query = "SELECT * FROM courses LIMIT $numberFodesolay,6";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $Allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);
        $courses=[];
        foreach ($Allcourses as $course) {
            $courses[] = new Coures($course->course_name , $course->course_description, $course->content , $course->participants);
        }  
        var_dump($courses);
        return $courses;
    }
    
    public function allCoures()
    {
        $query = "SELECT * FROM courses INNER JOIN categories on courses.category_id = categories.category_id 
        INNER JOIN users ON users.user_id = courses.teacher_id
        INNER JOIN roles on users.role_id=roles.role_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $Allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);
       
       
        $courses=[];
        foreach ($Allcourses as $course) {
            $teachers = new Teacher($id = null, $course->username, $description = null); 
            $categories = new Category($course->category_name);
            $courses[] = new Coures($course->course_name,
                                 $course->course_description,
                                  $course->content ,
                                   $course->participants,
                                    $categories,
                                     $teachers,
                                       $course->active,
                                        $course->deleted_at,
                                         $course->date_creation );
        }
        return $courses;
    }

    

    public function clculeRows(){
        $sql="SELECT COUNT(*) FROM courses";
        $stmt=$this->connexion->prepare($sql);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        return  $resulte;

        }
}