<?php 
namespace App\Models;


use App\Models\Connection;



class Exercies  
{
    private $id;
    private $name ;
    private $content;
    private $description;
    private $couers_id;
    private $created_at;
    private $updated_at;

    public function __construct($id, $name, $description, $course_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->course_id = $course_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCourseId()
    {
        return $this->course_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }


}