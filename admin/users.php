<?php
    $page_title = "Users";
    $currentPage = "Users";
    require_once("../classes/User.php");
    $user = new User;
    include_once("template/header.php");
    $user->checkLogin($userid);
?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header text-white bg-secondary">
            <h3>Users</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $res = $user->getUsers();

                        foreach($res as $key => $row){
                            $id = $row['user_id'];
                            $dd = strtotime($row['birthdate']);
                            $bdate = date('M d, Y', $dd);
                            echo "<tr>"; 
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $bdate . "</td>";
                            echo "<td><a href='edituser.php?id=$id' class='btn btn-info btn-sm'>Edit</a> 
                            <a href='userAction.php?actiontype=delete&id=$id' class='btn btn-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include_once("template/footer.php");
?>