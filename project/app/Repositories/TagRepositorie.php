<?php
namespace App\Repositories;


use Config\Database;

use Exception;
use PDOException;
use PDO;
use App\Models\Tags;
class TagRepositorie {

    private $connexion;


    public function __construct() {
        $this->connexion = Database::getConnection();
    }

    public function index(){
        try {
            $query = $this->connexion->prepare("SELECT 
                                                            tags.tag_id, 
                                                            tags.tag_name, 
                                                            tags.date_creation, 
                                                            tags.isActive, 
                                                            COUNT(course_tags.course_id) AS usage_count
                                                        FROM 
                                                            tags
                                                        LEFT JOIN 
                                                            course_tags ON tags.tag_id = course_tags.tag_id
                                                        WHERE tags.deleted IS NULL
                                                        GROUP BY 
                                                            tags.tag_id, tags.tag_name
                                                        ORDER BY 
                                                            usage_count DESC;

                                                        ");
            $query->execute();  
            $tags = $query->fetchAll(PDO::FETCH_OBJ);
            $Tags = [];
            foreach ($tags as $tag) {
                $Tags[] = new Tags($tag->tag_id, $tag->tag_name, $tag->date_creation, $tag->usage_count, $tag->isActive);
            }
            return $Tags;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

    }

    public function addTag($tag_name, $tag_active){
       
        if ($tag_active == 'on') {
            $tag_active = 1;
        } else {
            $tag_active = 0;
        }
      
        
        try {
            $query = $this->connexion->prepare("INSERT INTO tags (tag_name, isActive) VALUES (:tag_name, :isActive)");
            $query->bindParam(':tag_name', $tag_name);
            $query->bindParam(':isActive', $tag_active);
            $query->execute();  
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function  deleteTag($tag_id){
        try {
            $query = $this->connexion->prepare("UPDATE tags SET deleted = NOW() WHERE tag_id = :tag_id;");
            $query->bindParam(':tag_id', $tag_id);
            $resulte = $query->execute();  
          
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    public function updateTag($tag_id, $tag_name , $tag_active){
        if ($tag_active == 'on') {
            $tag_active = 1;
        } else {
            $tag_active = 0;
        }
        try {
            $query = $this->connexion->prepare("UPDATE tags SET tag_name = :tag_name, isActive = :isActive WHERE tag_id = :tag_id;");
            $query->bindParam(':tag_id', $tag_id);
            $query->bindParam(':tag_name', $tag_name);
            $query->bindParam(':isActive', $tag_active);
            $resulte = $query->execute();  
          
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function activetationTag($tag_id, $tag_active){
        try {
            $query = $this->connexion->prepare("UPDATE tags SET isActive = :isActive WHERE tag_id = :tag_id;");
            $query->bindParam(':tag_id', $tag_id);
            $query->bindParam(':isActive', $tag_active);
            $resulte = $query->execute();  
          
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    } 



    public function count(){
        try {
            $query = $this->connexion->prepare("SELECT COUNT(*) FROM tags");
            $query->execute();  
            $nmuberUse = $query->fetchColumn();
            return $nmuberUse;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

    }

    
}