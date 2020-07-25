<?php
require_once 'inc/head.php';
require_once 'inc/header.php';
if(!isset($_SESSION['username'])){
    header('Location:login');
}

// to get the id of post to delete the post
if (isset($_GET['del_post_id'])){
    $del_post_id = $_GET['del_post_id'];
    // get post image
    $del_post_image_sql = "SELECT * FROM posts WHERE id ='$del_post_id'";
    $del_post_image_sql_res = mysqli_query($conn,$del_post_image_sql);
    $del_post_image_row = mysqli_fetch_array($del_post_image_sql_res);
    $del_post_image = $del_post_image_row['image'];

    $del_post_id_sql = "DELETE FROM `posts` WHERE id = '$del_post_id'";
    if (mysqli_query($conn,$del_post_id_sql)){
        // deleting image from system
        unlink('../../newspaper/img/bg-img/'.$del_post_image);
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
                <h3><i class="fa fa-file"></i> All Posts</h3>
                <?php
                    if(isset($_POST['checkbox'])){
                        foreach ($_POST['checkbox'] as $post_ids){
                            $bulk = $_POST['bulk_option'];
                            if($bulk == 'publish'){
                                $pub = "UPDATE posts SET status = 'publish' WHERE id = '$post_ids'";
                                mysqli_query($conn,$pub);
                            }
                            if($bulk == 'draft'){
                                $pub = "UPDATE posts SET status = 'draft' WHERE id = '$post_ids'";
                                mysqli_query($conn,$pub);
                            }
                            if($bulk == 'delete'){
                                $bulk_posts = "SELECT * FROM `posts` WHERE id = '$post_ids'";
                                $bulk_posts_res = mysqli_query($conn,$bulk_posts);
                                $bulk_posts_row = mysqli_fetch_array($bulk_posts_res);
                                $bulk_posts_imgs = $bulk_posts_row['image'];

                                $bulk_del = "DELETE FROM posts WHERE id = '$post_ids'";
                                $bulk_del_res = mysqli_query($conn,$bulk_del);
                                if ($bulk_del_res){
                                    unlink('../img/bg-img/'.$bulk_posts_imgs);
                                    header('refresh');
                                }
                            }
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="bulk_option" id="" class="form-control">
                                <option value="">Select Option</option>
                                <option value="publish">Change To Publish</option>
                                <option value="draft">Change To Draft</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-success rounded-0" value="Apply">
                        </div>
                    </div>

                <table class="table mt-5">
                    <thead>
                    <th><input type="checkbox" id="check_all_boxes"></th>
                    <th>Sr NO</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                        if ($_SESSION['role'] == 'author'){
                            $author_username = $_SESSION['username'];
                            $author_sql = "SELECT `first_name`,`last_name` FROM `user` WHERE username = '$author_username'";
                            $author_sql_res = mysqli_query($conn,$author_sql);
                            $author_row = mysqli_fetch_array($author_sql_res);
                            $first = $author_row['first_name'];
                            $last = $author_row['last_name'];
                            $author_name = $first.' '.$last;
                            $post_sql = "SELECT * FROM `posts` WHERE status = 'publish' AND author = '$author_name' ORDER BY id DESC ";
                        }
                        elseif($_SESSION['role'] == 'admin'){
                            $post_sql = "SELECT * FROM `posts` ORDER BY id DESC ";
                        }
                        $post_res = mysqli_query($conn,$post_sql);
                        $post_count = mysqli_num_rows($post_res);
                        $k=1;
                        if ($post_count > 0){
                            while ($post_row = mysqli_fetch_array($post_res)){
                            $id = $post_row['id'];
                            $category = ucwords($post_row['category']);
                            $date = getdate($post_row['date']);
                            $post_day = $date['mday'];
                            $post_month = substr($date['month'],0,3);
                            $post_year = $date['year'];
                            $post_image = $post_row['image'];
                            $post_title = $post_row['title'];
                            $post_status = $post_row['status'];
                    ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" class="checkboxes" value="<?=$id?>"></td>
                        <td><?= $k;?></td>
                        <td><?= $post_day.'.'.$post_month.','.$post_year;?></td>
                        <td><img src="../../newspaper/img/bg-img/<?= $post_image;?>" alt="" class="rounded-circle" style="width: 60px; height: 60px;"></td>
                        <td><?= $post_title;?></td>
                        <td><?= $category;?></td>
                        <td class="btn btn-secondary"><?= $post_status;?></td>
                        <td><a href="add_post?edit_post_id=<?= $id;?>"><i class="fa fa-edit"></i></a></td>
                        <td><a href="all_posts?del_post_id=<?= $id;?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
                                $k++;
                            }
                        }
                        else{
                            echo "<h3>No Post Found</h3>";
                        }
                    ?>
                    </tbody>
                </table>
                </form>

            </div>
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>
<script>
    $(document).ready(function () {
        $('#check_all_boxes').click(function () {
            if (this.checked){
                $('.checkboxes').each(function () {
                    this.checked = true;
                });
            }
            else{
                $('.checkboxes').each(function () {
                    this.checked = false;
                });
            }
        });
    });
</script>
