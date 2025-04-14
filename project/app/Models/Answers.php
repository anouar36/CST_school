<?php
namespace App\Models;

class Answers
{
    public $id;
    public $answer_text;
    public $is_correct;
    public $place;
    public $question_id;

    public function __construct($id, $answer_text, $is_correct, $question_id, $place = null)
    {
        $this->id = $id;
        $this->answer_text = $answer_text;
        $this->is_correct = $is_correct;
        $this->question_id = $question_id;
        $this->place = $place;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getAnswer()
    {
        return $this->answer_text;
    }
    
    public function isCorrect()
    {
        return $this->is_correct;
    }
    
    public function getQuestionId()
    {
        return $this->question_id;
    }
    public function getPlace()
    {
        return $this->place;
    }
}