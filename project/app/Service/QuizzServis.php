<?php 
namespace App\Service;

use App\Repositories\QuizzesRepositorie;
use App\Models\Quizze;
use App\Models\Question;
use App\Models\Answers; 
use App\Models\CategoriesQuizz;

class QuizzServis
{
    
    public function getObjectQuizzes($values)
    {
        $questions = [];
    
        foreach ($values as $row) {
            // Split the string values into arrays
            $answerTexts = explode('|', $row['answers']);
            $answerIds = explode('|', $row['answersId']);
            $isCorrectFlags = explode('|', $row['is_correct']);
            $questionIds = explode('|', $row['question_id']);
            $places = explode('|', $row['place']);
    
            
            $answers = [];
            for ($i = 0; $i < count($answerTexts); $i++) {
                $answers[] = new Answers(
                    $answerIds[$i],
                    $answerTexts[$i],
                    $isCorrectFlags[$i],
                    $questionIds[$i],
                    $places[$i]
                    
                );
            }
    
            // Create the Question object
            $question = new Question(
                $row['question_id'],
                $row['question_text'],
                $row['id'],
                $answers
            );
    
            $questions[] = $question;
        }
    
        // Create the Quiz object and assign questions
        // $id, $title, $techer_id, $description, $questions = []
        $quiz = new Quizze(
            $row['id'],
            $row['title'],
            $row['techer_id'],
            $row['description'],
            $questions
        );
       
    
        return $quiz;
    }
}
    