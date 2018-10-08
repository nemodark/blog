<?php
    session_start();
    require_once("../classes/Category.php");
    require_once("../classes/User.php");
    $category = new Category;
    $user = new User;
    $userid = $_SESSION['userid'];
    $user->checkLogin($userid);

    if(isset($_POST['add'])){
        $categoryname = $_POST['categoryname'];

        $category->createCategory($categoryname);
    }
    
?>