<?php
namespace App\Repositories;


use App\Models\Exercies;
use Config\Database;
use Exception;
use PDOException;
use PDO;



class ExerciesRepositorie{
    private $connection;
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function getAllExercies($id)
    {
        $query = "SELECT * FROM exercises 
        INNER JOIN exercise_course ON exercise_course.exercise_id = exercises.id
        WHERE exercise_course.course_id = :course_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':course_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $exercies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $exercies;
    }

    public function getExerciesById($id)
    {
        $query = "SELECT * FROM exercises WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $exercies = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$exercies) {
            throw new Exception("Exercies not found", 404);
        }
        return $exercies;
    }
}