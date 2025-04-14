<?php
namespace App\Models;


class Interaction {
    private $id;
    private $user_id;
    private $Student;
    private $course_id;
    private $like ; 
    private $subject ;
    private $commenter;
    private $star;
     
    private $created_at;
    private $updated_at;

   
    // Constructor to initialize the Interaction object
    public function __construct($user_id = null,$Student=null , $course_id = null, $like = null, $commenter = null, $star = null, $created_at = null, $updated_at = null, $subject = null) {
        $this->user_id = $user_id;
        $this->Student = $Student;
        $this->course_id = $course_id;
        $this->like = $like;
        $this->commenter = $commenter;
        $this->subject = $subject;
        $this->star = $star;
        $this->created_at = $created_at ?? date('Y-m-d H:i:s'); 
        $this->updated_at = $updated_at ?? date('Y-m-d H:i:s'); 
    }
     
    // Getters and Setters for each property
    public function getId() {
        return $this->id;
    }
   
    public function getUserId() {
        return $this->user_id;
    }

    
    public function getCourseId() {
        return $this->course_id;
    }
    public function getLike() {
        return $this->like;
    }
    public function getCommenter() {
        return $this->commenter;
    }
    public function getStar() {
        return $this->star;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getStudent() {
        return $this->Student;
    }
    public function getSubject() {
        return $this->subject;
    }



    
    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }
    public function setLike($like) {
        $this->like = $like;
    }
    public function setCommenter($commenter) {
        $this->commenter = $commenter;
    }
    public function setStar($star) {
        $this->star = $star;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
    public function setNameStudent($Student) {
        $this->Student = $Student;
    }
    
}

