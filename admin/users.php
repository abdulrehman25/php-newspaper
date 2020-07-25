<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['username'])){
    header('location:login');
}
if(isset($_SESSION['username']) && $_SESSION['role'] != 'admin'){
    header('Location:index');
}

// to get id of user to delete the user
if (isset($_GET['del_user_id'])){
    $del_user_id = $_GET['del_user_id'];
    //delete image
    $sql_del_user = "SELECT * FROM `user` WHERE id = '$del_user_id'";
    $sql_del_user_res = mysqli_query($conn,$sql_del_user);
    $sql_del_user_row = mysqli_fetch_array($sql_del_user_res);
    // get user full name to delete his/her all posts data
    $user_first_name = $sql_del_user_row['first_name'];
    $user_last_name = $sql_del_user_row['last_name'];
    $user_full_name = $user_first_name.' '.$user_last_name;
    // data fetch from db
//    $data_fetch = "SELECT * FROM post WHERE author = '$user_full_name'";
//    $data_fetch_res =mysqli_query($conn,$data_fetch);
//    while($data_row = mysqli_fetch_array($data_fetch_res)){
//
//
//    }
    $image_user_del = $sql_del_user_row['image'];
    $del_user_id_sql = "DELETE FROM `user` WHERE id = '$del_user_id'";

    if(mysqli_query($conn,$del_user_id_sql)){
      //unlink function used to delete file of anytype here is image to delete
        unlink('../../newspaper/img/users/'.$image_user_del);
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
                <h3><i class="fa fa-users"></i> All Users</h3>
                <table class="table">
                    <thead>
                    <th>Sr NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                        $user_sql = "SELECT * FROM `user` ORDER BY id";
                        $user_res = mysqli_query($conn,$user_sql);
                        $user_count = mysqli_num_rows($user_res);
                        $j=1;
                        if ($user_count > 0){
                            while ($user_row = mysqli_fetch_array($user_res)){
                                $id = $user_row['id'];
                                $first_name = $user_row['first_name'];
                                $last_name = $user_row['last_name'];
                                $full_name = ucwords($first_name.' '.$last_name);
                                $user_email = $user_row['email'];
                                $user_role = ucfirst($user_row['role']);
                                $user_image = $user_row['image'];
                    ?>
                        <tr>
                            <td><?= $j;?></td>
                            <td><?= $full_name;?></td>
                            <td><?= $user_email;?></td>
                            <td><?= $user_role;?></td>
                            <td><img src="../../newspaper/img/users/<?= $user_image;?>" alt="" class="rounded-circle" style="width: 60px; height: 60px;"></td>
                            <td><a href="add_user?edit_user_id=<?= $id;?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="users?del_user_id=<?= $id;?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php
                                $j++;
                            }
                        }
                        else{
                            echo '<h3>No User Found</h3>';
                        }

                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>