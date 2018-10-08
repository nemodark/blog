<?php
require_once("Database.php");

class Posts extends Database{

    public function getNewPosts(){
        $sql = "SELECT * FROM posts ORDER BY post_date DESC";
        $result = $this->conn->query($sql);
        
        if($result){
            
        }
    }
}