<?php
namespace App\Models;


class Quizze{
    private $id;
    private $title;
    private $techer_id;
    private $Category;
    private $description;
    private $questions = [];

    public function __construct($id, $title, $techer_id, $description, $questions = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->techer_id = $techer_id;
        $this->description = $description;
        $this->questions = $questions;

    }
    

    public function getId()
    {
        return $this->id;
    }

    public function getCategory()
    {
        return $this->Category;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getTecherId()
    {
        return $this->techer_id;
    }
}