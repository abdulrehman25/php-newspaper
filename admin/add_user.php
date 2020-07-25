<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['username'])){
    header('location:login');
}
if(isset($_SESSION['username']) && $_SESSION['role'] != 'admin'){
    header('Location:index');
}

// get user id to edit user info
if (isset($_GET['edit_user_id'])){
    $edit_user_id = $_GET['edit_user_id'];
    $edit_user_sql = "SELECT * FROM `user` WHERE id = '$edit_user_id'";
    $edit_user_id_res = mysqli_query($conn,$edit_user_sql);
    $edit_user_id_row = mysqli_fetch_array($edit_user_id_res);
    $edit_user_first_name = $edit_user_id_row['first_name'];
    $edit_user_last_name = $edit_user_id_row['last_name'];

    $edit_user_password = $edit_user_id_row['password'];
    $edit_user_des = $edit_user_id_row['details'];
    $edit_role = $edit_user_id_row['role'];
    $edit_user_details = $edit_user_id_row['details'];
    $user_image = $edit_user_id_row['image'];

    //posting the updated data
    if (isset($_POST['edit_user'])){
        $first = $_POST['first_name'];
        $last = $_POST['last_name'];
        $date = time();
        $picture = $_FILES['pic']['name'];
        $temp = $_FILES['pic']['tmp_name'];
        $unique = substr($date,7,3);
        $target = $unique.$picture;
        $role = $_POST['role'];
        $password = $_POST['password'];
        $password = md5($password);
        $detail = $_POST['details'];
        if (empty($picture)){
            $target = $user_image;
        }
        else{
                unlink('../img/users/' . $user_image);
        }

        $update_user_sql = "UPDATE `user` SET `first_name` = '$first', `last_name` = '$last', `date` = '$date', `image` = '$target',`role`= '$role',`password` = '$password',`details` = '$detail' WHERE id = '$edit_user_id'";

        if (mysqli_query($conn,$update_user_sql)){
            move_uploaded_file($temp,'../img/users/'.$target);
            $success_msg_updated = '<span class="text-success">User Updated Successfully</span>';

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
        <div class="col-md-5">
            <?php
                require_once 'address.php';
            ?>
            <?php
            if(isset($_POST['add_user'])){
                $first = $_POST['first_name'];
                $last = $_POST['last_name'];
                $date = time();
                $picture = $_FILES['pic']['name'];
                $temp = $_FILES['pic']['tmp_name'];
                $unique = substr($date,7,3);
                $target = $unique.$picture;
                $role = $_POST['role'];
                $username = $first.$last.substr(rand(1,999999),1,4);
                $password = $_POST['password'];
                $password = md5($password);
                $detail = $_POST['details'];
                $email = $_POST['email'];

                if(empty($first) || empty($last) || empty($picture) || empty($role) || empty($password) || empty($email) || empty($detail)){
                    $error_message1 = '<span class="text-danger">All * Fields are required</span>';
                }
                else{
                    $query1 = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `email`, `password`, `image`, `role`, `details`, `date`) VALUES 
                                                  ('$first','$last','$username','$email','$password','$target','$role','$detail','$date')";
                    $res = mysqli_query($conn,$query1);
                    if ($res){
                        move_uploaded_file($temp,"../img/users/".$target);
                        $success_msg1 = '<span class="text-success">User Added Successfully</span>';
                    }

                }
            }
            ?>
            <h3><i class="fa fa-user-plus"></i> <?= ((isset($_GET['edit_user_id']))?'Edit User':'Add User')?></h3>
            <hr>
            <h6>Required <i class="text-danger">*</i></h6>

            <?php
            if (isset($error_message1)){
                echo $error_message1;
            }
            elseif (isset($success_msg1)){
                echo $success_msg1;
                header('Refresh:3');
            }
            elseif (isset($success_msg_updated)){
                echo $success_msg_updated;
                header('Refresh:3;url=users');
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>First Name <i class="text-danger">*</i></label>
                    <input type="text" name="first_name" class="form-control" value="<?= ((isset($_GET['edit_user_id']))?$edit_user_first_name:'')?>">
                </div>
                <div class="form-group">
                    <label>Last Name <i class="text-danger">*</i></label>
                    <input type="text" name="last_name" class="form-control" value="<?= ((isset($_GET['edit_user_id']))?$edit_user_last_name:'')?>">
                </div>
                <?php
                    if (isset($_GET['edit_user_id'])){

                    }
                    else{
                ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" disabled value="<?= ((isset($_POST['add_user'])?$username:''))?>">
                </div>
                <div class="form-group">
                    <label>Email <i class="text-danger">*</i></label>
                    <input type="email" name="email" class="form-control" value="">
                </div>
                <?php

                    }

                ?>
                <div class="form-group">
                    <label>Password <i class="text-danger">*</i></label>
                    <input type="password" name="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Picture <i class="text-danger">*</i></label>
                    <input type="file" name="pic" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role <i class="text-danger">*</i></label>
                    <select name="role" class="form-control">
                        <option value="">Select Role</option>
                        <option value="admin" <?php if (isset($edit_role) == 'admin'){ echo 'selected';} ?>>Admin</option>
                        <option value="author" <?php if (isset($edit_role) == 'author'){ echo 'selected';} ?>>Author</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Details <i class="text-danger">*</i></label>
                    <textarea name="details" class="form-control" rows="5">
                        <?php if (isset($edit_user_details)){ echo $edit_user_details;}?>
                    </textarea>
                </div>
                <input type="submit" class="btn btn-success rounded-0" name="<?= ((isset($_GET['edit_user_id']))?'edit_user':'add_user')?>" value="<?= ((isset($_GET['edit_user_id']))?'Edit User':'Add User')?>">
            </form>
        </div>
    </div>
</div>
<?php
    require_once 'inc/footer.php';
?>