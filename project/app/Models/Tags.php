<?php 

namespace App\Models;


class Tags
{
    private $id;
    private $name;
    private $date_creation ;

    private $usage_count;

    private $isActive;

    public function __construct($id = null, $name = null,$date_creation=  null, $usage_count = null, $isActive = null) {
        $this->id = $id;
        $this->name = $name;
        $this->date_creation = $date_creation;
        $this->usage_count = $usage_count;
        $this->isActive = $isActive;
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function getUsage_count() {
        return $this->usage_count;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function setUsage_count($usage_count) {
        $this->usage_count = $usage_count;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }   
}
    