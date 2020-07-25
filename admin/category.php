<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['username'])){
    header('location:login');
}
// to get id of category to edit it
if (isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_sql = "SELECT * FROM categories WHERE id = '$edit_id'";
    $edit_sql_res = mysqli_query($conn,$edit_sql);
    $row_edit = mysqli_fetch_array($edit_sql_res);
    $edit_category = $row_edit['category'];
    if (isset($_POST['edit_category'])){
        $get_category = $_POST['category'];
        $update_category_sql = "UPDATE `categories` SET `category`='$get_category' WHERE id = '$edit_id'";
        $update_category_sql_res = mysqli_query($conn,$update_category_sql);
        if ($update_category_sql_res){
            header('location:category');
        }
    }
}
?>
<div class="container">
    <div class="row mt-2 mb-2">
        <div class="col-md-3">
            <?php
            require_once 'inc/sidebar.php';
            ?>
        </div>
        <div class="col-md-9">
            <?php
            require_once 'address.php';
            ?>
            <h3><?= ((isset($_GET['edit'])?'Edit':'Add'));?> Category</h3>
            <div class="row">
                <div class="col-md-6">
                    <?php
                        //add category
                        if (isset($_POST['submit_category'])){
                            $category0 = $_POST['category'];
                            if (empty($category0)){
                                $error_msg = "<h6 class='text-danger'>Fill Field Add Category</h6>";
                            }
                            else{
                                $sql1 = "INSERT INTO `categories`(`category`) VALUES ('$category0')";
                                $res1 = mysqli_query($conn,$sql1);
                                $success_msg = "<h6 class='text-success'>Category Added</h6>";
                            }

                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <?php
                                if (isset($error_msg)){
                                    echo $error_msg;
                                }
                                elseif (isset($success_msg)){
                                    echo $success_msg;
                                    header('Refresh:3');
                                }
                            ?>
                            <input type="text" class="form-control" name="category" placeholder="<?=((isset($_GET['edit']))?'Edit Category':'Add Category')?>" value="<?=((isset($_GET['edit']))?$edit_category:'')?>">
                        </div>
                        <input type="submit" name="<?=((isset($_GET['edit']))?'edit_category':'submit_category')?>" class="btn btn-success rounded-0" value="<?=((isset($_GET['edit']))?'Edit Category':'Add Category')?>">
                    </form>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php

                            if (isset($_GET['del'])){
                                $del_id = $_GET['del'];
                                $sql_del = "DELETE FROM categories WHERE id = '$del_id'";
                                mysqli_query($conn,$sql_del);
                            }

                            $sql0 = "SELECT * FROM categories";
                            $res0 = mysqli_query($conn,$sql0);

                            $count0 = mysqli_num_rows($res0);
                            if ($count0 > 0){
                                $i=1;
                                while($row0 = mysqli_fetch_array($res0)){
                                $id = $row0['id'];
                                $category = ucwords($row0['category']);

                        ?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><?= $category;?></td>
                            <td><a href="category?edit=<?= $id;?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="category?del=<?= $id;?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php
                                    $i++;
                                }
                            }
                            else{
                                echo '<h3>No Category Found</h3>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'inc/footer.php';
?>
