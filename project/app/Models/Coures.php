<?php
namespace App\Models;

class Coures {
    private $course_id;
    private $course_name;
    private $course_description;
    private $content;
    private $participants;
    private $category;
    private $teacher;
    private $start_date;
    private $created_at;
    private $active;
    private $deleted_at;
    private $date_creation;

    public function __construct(
        $course_name = null, 
        $course_description = null, 
        $content = null, 
        $participants = 0, 
        $category = null, 
        $teacher = null,
        $start_date = null,
        $active = 1,
        $deleted_at = null,
        $date_creation = null
    ) {
        $this->course_name = $course_name;
        $this->course_description = $course_description;
        $this->content = $content;
        $this->participants = $participants;
        $this->category = $category;
        $this->teacher = $teacher;
        $this->start_date = $start_date;
        $this->active = $active;
        $this->deleted_at = $deleted_at;
        $this->date_creation = $date_creation ?? date('Y-m-d H:i:s'); // Default to current timestamp if null
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    public function getCourseName() {
        return $this->course_name;
    }

    public function setCourseName($course_name) {
        $this->course_name = $course_name;
    }

    public function getCourseDescription() {
        return $this->course_description;
    }

    public function setCourseDescription($course_description) {
        $this->course_description = $course_description;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getParticipants() {
        return $this->participants;
    }

    public function setParticipants($participants) {
        $this->participants = $participants;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category_id = $category;
    }

    public function getTeacher() {
        return $this->teacher;
    }

    public function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }

    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }
}
