<?php
namespace App\Models;


class Question
{
    public $id;
    public $question_text;
    public $quiz_id;
    public $answers = [];

    public function __construct($id, $question_text, $quiz_id, $answers = [])
    {
        $this->id = $id;
        $this->question_text = $question_text;
        $this->quiz_id = $quiz_id;
        $this->answers = $answers;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getQuestion()
    {
        return $this->question_text;
    }
    public function getQuizId()
    {
        return $this->quiz_id;
    }
    public function getAnswers()
    {
        return $this->answers;
    }

}