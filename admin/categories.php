<?php
    $page_title = "Categories";
    $currentPage = "Categories";
    require_once("../classes/User.php");
    require_once("../classes/Category.php");
    $user = new User;
    $category = new Category;
    include_once("template/header.php");
    $user->checkLogin($userid);
?>
<div class="container">
    <?php
        if(!empty($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="card mt-3">
        <div class="card-header text-white bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h3>Categories</h3>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-light btn-sm float-right mt-1" data-toggle="modal" data-target="#addCat">
                        Add Category
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $res = $category->getCategories();

                        foreach($res as $key => $row){
                            $id = $row['category_id'];
                            echo "<tr>"; 
                            echo "<td>" . $id . "</td>";
                            echo "<td>" . $row['category_name'] . "</td>";
                            echo "<td><a href='categoryAction.php?id=$id' class='btn btn-outline-info btn-sm'>Edit</a> 
                            <a href='categoryAction.php?actiontype=delete&id=$id' class='btn btn-outline-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="catAction.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="categoryname" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once("template/footer.php");
?>