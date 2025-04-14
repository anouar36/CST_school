<?php
namespace App\Repositories;
use App\Models\Quizzes;
use Config\Database;
use PDO;
use PDOException;


class QuizzesRepositorie
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = Database::getConnection();
    }
    public function getAllQuizzes($id)
    {
        $sql = "SELECT 
            quizzes.id,
            quizzes.title,
            quizzes.description,
            quizzes.created_by,
            quizzes.cours_id,
            categoriesQuizz.id as category_id,
            categoriesQuizz.name as category_name,
            FROM `quizzes` INNER JOIN categoriesQuizz on quizzes.categori_id = categoriesQuizz.id WHERE cours_id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $quizzes;     
    }

    public function getQuizById($id)
    {
        $sql = "SELECT 
                questions.id AS question_id,
                questions.question_text,
                quizzes.id as id,
                 quizzes.title as title,
                quizzes.created_by as techer_id,
                quizzes.description as description,
                GROUP_CONCAT(answers.answer_text SEPARATOR '|') AS answers,
                GROUP_CONCAT(answers.id SEPARATOR '|') AS answersId,
                GROUP_CONCAT(answers.is_correct SEPARATOR '|') AS is_correct,
                GROUP_CONCAT(answers.question_id SEPARATOR '|') AS question_id,
                GROUP_CONCAT(answers.place SEPARATOR '|') AS place
            FROM quizzes
            INNER JOIN categoriesQuizz ON quizzes.categori_id = categoriesQuizz.id
            INNER JOIN questions ON quizzes.id = questions.quiz_id
            INNER JOIN answers ON answers.question_id = questions.id
            WHERE quizzes.id = :id
            GROUP BY questions.id, questions.question_text;";
                
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $quiz = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $quiz;
    }
    
    public function createQuiz($data)
    {
        // $quiz = new Quizzes;
        // $quiz->title = $data['title'];
        // $quiz->description = $data['description'];
        // $quiz->course_id = $data['course_id'];
        // $quiz->save();
        // return $quiz;
    }
}