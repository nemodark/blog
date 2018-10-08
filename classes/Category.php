<?php
require_once("Database.php");

class Category extends Database{

    public function getCategories(){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);
        
        if($result){
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public function getOneCategory($id){
        $sql = "SELECT * FROM categories WHERE category_id = $id";
        $result = $this->conn->query($sql);

        if($result){
            $row = $result->fetch_assoc();

            return $row;
        }
    }

    public function createCategory($categoryname){
        $sql = "SELECT * FROM categories WHERE category_name = '$categoryname'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $this->danger("Category already exist");
        }
        else{
            $sql = "INSERT INTO categories(category_name) VALUES('$categoryname')";
            $result = $this->conn->query($sql);
            $msg = $this->success("Category added successfully");
            $_SESSION['msg'] = $msg;

            header("location: categories.php");
        }

    }
}