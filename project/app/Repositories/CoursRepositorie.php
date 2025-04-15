<?php
namespace App\Repositories;


use Config\Database;
use App\Models\Coures;
use App\Models\Category;
use App\Models\Teacher;
use App\Models\Tags;
use App\Models\Interaction;
use App\Models\Student;

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
                 courses.halfPrice,
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
              GROUP BY courses.intro, courses.Level,  courses.date_creation, courses.duration ,                      courses.course_id, users.username, categories.category_name
               LIMIT 0, 25";

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
                $id,
                $course->duration,
                $course->Level,
                $course->intro,
                '',
                $course->halfPrice,
                
            );
        } else {
            throw new Exception("Course not found.");
        }
    }

     public function interaction ($userId, $courseId)
    {
        $query = "SELECT * FROM interaction
                  INNER JOIN users on interaction.user_id = users.user_id
                  WHERE interaction.user_id = :userId AND course_id = :courseId
                  LIMIT 0, 25 ";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->execute();
        $inter = $stmt->fetch(PDO::FETCH_OBJ);

        if ($inter) {
            return new Interaction(
                $inter->user_id,
                $inter->username,   
                $inter->course_id,
                $inter->likeer,      
                $inter->commenter,
                $inter->star,
                null,                
                null                  
            );
        } else {
            return false;
        }
       
     
        

           
    }





    public function reviews ($courseId)
    {
        $query = "SELECT * FROM interaction
                  INNER JOIN users on interaction.user_id = users.user_id
                  WHERE  course_id = :courseId
                  LIMIT 0, 25 ";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->execute();
        $interaction = $stmt->fetchAll(PDO::FETCH_OBJ);


        
        
        $reviews = [];
        foreach ($interaction as $inter) {
            $student = new Student($inter->user_id,$inter->username, null, null, null, null,$inter->image, null);

            $reviews[] = new Interaction(
                $inter->user_id,
                $student ,   
                $inter->course_id,
                $inter->likeer,      
                $inter->commenter,
                $inter->star,
                $inter->dateRview,                
                null  ,
                $inter->subject,                
            );
        }
        return $reviews;
    }

    public function searchCourse($serch)
    {
        // var_dump($query);
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
               WHERE courses.course_name  LIKE :id
              GROUP BY courses.intro, courses.Level,  courses.date_creation, courses.duration , courses.course_id, users.username, categories.category_name";

        $stmt = $this->connexion->prepare($query);
        $searchTerm = "%$serch%";


        $stmt->bindParam(':id', $searchTerm, PDO::PARAM_STR);
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
                "",
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




    // public function allCoures()
    // {
    //     $serch = "SELECT 
    //             courses.course_name,
    //             courses.course_description,
    //             courses.content,
    //             courses.date_creation,
    //             courses.participants,
    //             courses.active,
    //             courses.deleted_at,
    //             users.username,
    //             categories.category_name, 
    //             GROUP_CONCAT(tags.tag_name) AS tags
    //           FROM courses 
    //           INNER JOIN users ON courses.teacher_id = users.user_id
    //           INNER JOIN categories ON courses.category_id = categories.category_id 
    //           LEFT JOIN course_tags ON courses.course_id = course_tags.course_id
    //           LEFT JOIN tags ON course_tags.tag_id = tags.tag_id 
    //           GROUP BY courses.course_id, users.username, categories.category_name
    //           ORDER BY courses.participants ASC 
    //           LIMIT 25";

    //     $stmt = $this->connexion->prepare($query);
    //     $stmt->execute();
    //     $Allcourses = $stmt->fetchAll(PDO::FETCH_OBJ);



    //     $courses = [];
    //     foreach ($Allcourses as $course) {

    //         $tags = $course->tags ? explode(',', $course->tags) : []; // تجنب الأخطاء عند عدم وجود علامات
    //         $teacher = new Teacher($course->username, null, null,);
    //         $category = new Category(null, $course->category_name);

    //         $courses[] = new Coures(

    //             $course->course_name,
    //             $course->price,
    //             course_description: $course->course_description,
    //             $course->content,
    //             $course->participants,
    //             $category,
    //             "",
    //             $teacher,
    //             $course->date_creation,
    //             $course->active,
    //             $course->deleted_at,
    //             $course->date_creation,
    //             $course->course_id,
    //             $course->duration,
    //             $course->Level,
    //             $course->intro
    //         );
    //     }



    //     return $courses;
    // }




    public function clculeRows()
    {
        $sql = "SELECT COUNT(*) FROM courses";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resulte;

    }

    public function getCouersOrder($idUser)
    {
        $query = "SELECT 
                    courses.course_name AS name,
                    courses.course_description AS description,
                    courses.intro AS intro,
                    courses.content AS content,
                    courses.price AS price,
                    courses.date_creation AS creation_date,
                    courses.participants AS participants,
                    courses.active AS active,
                    courses.deleted_at AS deleted_at,
                    courses.course_id AS id,
                    courses.duration AS duration,
                    courses.Level AS level,
                    teacher.username AS teacher,
                    teacher.image AS teacher_image,
                    categories.category_name AS category,
                    GROUP_CONCAT(tags.tag_name) AS tags
                FROM 
                    courses
                INNER JOIN 
                    users AS teacher ON courses.teacher_id = teacher.user_id
                INNER JOIN 
                    categories ON courses.category_id = categories.category_id
                INNER JOIN 
                    orders ON orders.course_id = courses.course_id
                INNER JOIN 
                    users AS student ON student.user_id = orders.user_id
                LEFT JOIN 
                    course_tags ON courses.course_id = course_tags.course_id
                LEFT JOIN 
                    tags ON course_tags.tag_id = tags.tag_id 
                WHERE 
                    student.user_id = :id
                GROUP BY 
                    courses.course_id,
                    courses.course_name,
                    courses.course_description,
                    courses.intro, 
                    courses.content,
                    courses.price,
                    courses.date_creation, 
                    courses.participants,
                    courses.active,
                    courses.deleted_at,
                    courses.duration,
                    courses.Level,
                    teacher.username, 
                    teacher.image, 
                    categories.category_name
                LIMIT 0, 25;";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $Allcourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$Allcourses) {
            return false;
        } else {
            
            return $Allcourses;
        }
    }

    public function getAssessment($id = 4)
    {
        $query = "SELECT ROUND(SUM(interaction.star) * 1.0 / COUNT(interaction.user_id), 1) AS assessment
        FROM interaction
        WHERE interaction.course_id = :id  AND interaction.star IS NOT NULL ;
        ";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $assessment = $stmt->fetch(PDO::FETCH_OBJ);
        if ($assessment->assessment==null) {
            return 0;
        } else if ($assessment->assessment!=null) {
            $assessment = $assessment->assessment;
        }else{
            return false;
        }
        

        
        return $assessment;

    }

    public function like($id, $userId,$islike)
    {
        $query = "UPDATE interaction SET likeer = :islike WHERE course_id = :course_id AND user_id = :user_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':course_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':islike', $islike, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function isActive($courseId, $userId)
    {
        $query = "SELECT * FROM orders WHERE  course_id = :courseId AND user_id = :userId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $interaction = $stmt->fetch(PDO::FETCH_OBJ);

        if ($interaction) {
            return true;
        } else {
            return false;
        }

    }

    public function addReview($courseId, $userId, $comment, $rating,$subject)
    {
        $query = "INSERT INTO interaction (course_id, user_id, commenter, star,subject) VALUES (:courseId, :userId, :commenter, :star , :subject)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':commenter', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':star', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);

        $resulte = $stmt->execute();
        if($resulte) {
            return true;
        } else {
            return false;
        }
    }

    public function countInteraction($id)
    {
        $query = "SELECT COUNT(*) FROM interaction WHERE interaction.course_id = :id AND interaction.commenter IS NOT NULL";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
   


}