<?php
namespace App\Repositories;


use Config\Database;
use App\Models\Coures;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Tags;

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
        $query = "SELECT 
                courses.course_name,
                courses.course_description,
                courses.content,
                courses.price,
                courses.date_creation,
                courses.participants,
                courses.active,
                courses.deleted_at,
                users.username,
                courses.course_id,
                categories.category_name, 
                GROUP_CONCAT(tags.tag_name) AS tags
              FROM courses 
              INNER JOIN users ON courses.teacher_id = users.user_id
              INNER JOIN categories ON courses.category_id = categories.category_id 
              LEFT JOIN course_tags ON courses.course_id = course_tags.course_id
              LEFT JOIN tags ON course_tags.tag_id = tags.tag_id 
              GROUP BY  courses.course_id, users.username, categories.category_name
              ORDER BY courses.participants ASC 
              LIMIT 25 OFFSET :offset";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':offset', $numberFodesolay, PDO::PARAM_INT);
        $stmt->execute();
        $Allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);



        $courses = [];

        foreach ($Allcourses as $course) {
            $tags = $course->tags ? explode(',', $course->tags) : [];
            $tagsName = [];
            foreach ($tags as $key => $tag) {
                $tagsName[$key] = new Tags(null, $tag);

            }

            $teacher = new Teacher($course->username, null, null);
            $category = new Category(null, $course->category_name);

            $courses[] = new Coures(
                $course->course_name,
                $course->price,
                $course->course_description,
                $course->content,
                $course->participants,
                $category,
                $tagsName,
                $teacher,
                $course->date_creation,
                $course->active,
                "",
                "",
                $course->course_id,  
            );
        }
        return $courses;
    }

    public function getCourseById($id)
    {
        $query = "SELECT 
                courses.course_name,
                courses.course_description,
                courses.intro,
                courses.content,
                courses.price,
                courses.date_creation,
                courses.participants,
                courses.active,
                courses.deleted_at,
                courses.course_id,
                courses.duration,
                courses.Level,
                courses.date_creation,
                users.username,
                users.image,
                categories.category_name, 
                GROUP_CONCAT(tags.tag_name) AS tags
              FROM courses 
              INNER JOIN users ON courses.teacher_id = users.user_id
              INNER JOIN categories ON courses.category_id = categories.category_id 
              LEFT JOIN course_tags ON courses.course_id = course_tags.course_id
              LEFT JOIN tags ON course_tags.tag_id = tags.tag_id 
              WHERE courses.course_id = :id
              GROUP BY courses.intro, courses.Level,  courses.date_creation, courses.duration , courses.course_id, users.username, categories.category_name";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $course = $stmt->fetch(PDO::FETCH_OBJ);

        if ($course) {
            $tags = $course->tags ? explode(',', $course->tags) : [];
            $tagsName = [];
            foreach ($tags as $key => $tag) {
                $tagsName[$key] = new Tags(null, $tag);

            }

            $teacher = new Teacher($course->username, null, null, $course->image);
            // var_dump($teacher->getImage());
            $category = new Category(null, $course->category_name);

            return new Coures(


                $course->course_name,
                $course->price,
                $course->course_description,
                $course->content,
                $course->participants,
                $category,
                $tagsName,
                $teacher,
                $course->date_creation,
                $course->active,
                $course->deleted_at,
                $course->date_creation,
                $course->course_id,
                $course->duration,
                $course->Level,
                $course->intro
                
            );
        } else {
            throw new Exception("Course not found.");
        }
    }




    public function allCourses()
    {
        $query = "SELECT 
                courses.course_name,
                courses.course_description,
                courses.content,
                courses.date_creation,
                courses.participants,
                courses.active,
                courses.deleted_at,
                users.username,
                users.image,
                categories.category_name, 
                GROUP_CONCAT(tags.tag_name) AS tags
              FROM courses 
              INNER JOIN users ON courses.teacher_id = users.user_id
              INNER JOIN categories ON courses.category_id = categories.category_id 
              LEFT JOIN course_tags ON courses.course_id = course_tags.course_id
              LEFT JOIN tags ON course_tags.tag_id = tags.tag_id 
              GROUP BY courses.course_id, users.username, categories.category_name
              ORDER BY courses.participants ASC 
              LIMIT 25";

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $Allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);

       

        $courses = [];
        foreach ($Allcourses as $course) {
            
            $tags = $course->tags ? explode(',', $course->tags) : []; // تجنب الأخطاء عند عدم وجود علامات
            $teacher = new Teacher($course->username, null, null,);
            $category = new Category(null, $course->category_name);

            $courses[] = new Coures(

                $course->course_name,
                $course->course_description,
                $course->content,
                $course->participants,
                $category,
                $tags,
                $teacher,
                $course->date_creation,
                $course->active,
                $course->deleted_at
            );
        }

        var_dump($courses->getTeacher()->getImage());
        exit; 

        return $courses;
    }




    public function clculeRows()
    {
        $sql = "SELECT COUNT(*) FROM courses";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resulte;

    }
}