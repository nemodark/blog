<?php
  session_start();
  $userid = $_SESSION['userid'];
  $res = $user->getSpecificUser($userid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title; ?> | Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($currentPage =='Home'){echo 'active';}?>">
        <a class="nav-link" href="http://localhost/blogoop/admin/index.php">Home</a>
      </li>
      <li class="nav-item <?php if($currentPage =='Categories'){echo 'active';}?>">
        <a class="nav-link" href="http://localhost/blogoop/admin/categories.php">Categories</a>
      </li>
      <li class="nav-item <?php if($currentPage =='Users'){echo 'active';}?>">
        <a class="nav-link" href="http://localhost/blogoop/admin/users.php">Users</a>
      </li>
    </ul>
    <span class="navbar-text">
      Logged in as <?php echo $res['username']; ?>
    </span>
  </div>
</nav>