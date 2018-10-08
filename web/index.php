<?php
    require_once("../classes/User.php");
    $page_title = "Home";
    $currentPage = "Home";
    session_start();
    $userid = $_SESSION['userid'];
    $user = new User;
    $user->checkLogin($userid, $_SESSION['type']);
    
    include_once("template/header.php");
?>
