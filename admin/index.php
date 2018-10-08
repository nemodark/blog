<?php
    $page_title = "Home";
    $currentPage = "Home";
    require_once("../classes/User.php");
    $user = new User;
    include_once("template/header.php");
    
    $user->checkLogin($userid);
?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header text-white bg-secondary">
            <h3>New posts</h3>
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
</div>

<?php
    include_once("template/footer.php");
?>