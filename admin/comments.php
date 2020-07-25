
<?php
require_once 'inc/head.php';
require_once 'inc/header.php';

if(!isset($_SESSION['username'])){
    header('Location:login');
}
if (isset($_GET['del_comment_id'])){
    $del_comt_id = $_GET['del_comment_id'];
    //to get the user image
    $img_sql = "SELECT image FROM comments WHERE id = '$del_comt_id'";
    $img_res = mysqli_query($conn,$img_sql);
    $img_row = mysqli_fetch_array($img_res);
    $user_img = $img_row['image'];
    //delete query for deleting comment
    $del_sql = "DELETE FROM `comments` WHERE id = '$del_comt_id'";
    $del_sql_res = mysqli_query($conn,$del_sql);
    //for unlinking the user image
    //    if(isset($del_sql_res)){
//        unlink('../img/bg-img/'.$user_img);
//    }
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
            <h3><i class="fa fa-comments"></i> Comments</h3>
            <?php
                if (isset($_POST['checkbox'])){
                    foreach ($_POST['checkbox'] as $comt_id){
                        $bulk = $_POST['bulk_option'];

                        if ($bulk == 'approved'){
                            $comt_appr = "UPDATE `comments` SET status = 'approved' WHERE id = '$comt_id'";
                            mysqli_query($conn,$comt_appr);
                        }
                        if ($bulk == 'disabled'){
                            $comt_dis = "UPDATE `comments` SET status = 'disabled' WHERE id = '$comt_id'";
                            mysqli_query($conn,$comt_dis);
                        }
                        if ($bulk == 'delete'){
                            $comt_delete = "DELETE FROM `comments` WHERE id = '$comt_id'";
                            mysqli_query($conn,$comt_delete);
                        }
                    }
                }
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <select name="bulk_option" id="" class="form-control">
                            <option value="">Select Option</option>
                            <option value="approved">Approved</option>
                            <option value="disabled">Disabled</option>
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
                        <th>Name of Commenter</th>
                        <th>Post Title</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    $comt_sql = "SELECT * FROM `comments` ORDER BY id DESC ";
                    $comt_res = mysqli_query($conn,$comt_sql);
                    $comt_count = mysqli_num_rows($comt_res);
                    $k=1;
                    if ($comt_count > 0){
                        while ($comt_row = mysqli_fetch_array($comt_res)){
                            $id = $comt_row['id'];
                            $date = getdate($comt_row['date']);
                            $comt_day = $date['mday'];
                            $comt_month = substr($date['month'],0,3);
                            $comt_year = $date['year'];
                            $comter_name = ucwords($comt_row['name']);
                            $comt_status = ucwords($comt_row['status']);
                            $comt_post_id = $comt_row['post_id'];
                            $post_sql = "SELECT title FROM `posts` WHERE id = '$comt_post_id'";
                            $post_sql_res = mysqli_query($conn,$post_sql);
                            $post_row = mysqli_fetch_array($post_sql_res);
                            $post_title = $post_row['title'];
                            ?>
                            <tr>
                                <td><input type="checkbox" class="checkboxes" name="checkbox[]" value="<?= $id;?>"></td>
                                <td><?= $k;?></td>
                                <td><?= $comt_day.'.'.$comt_month.','.$comt_year;?></td>
                                <td><?= $comter_name;?></td>
                                <td><?= $post_title;?></td>
                                <td class="btn btn-secondary"><?= $comt_status;?></td>
                                <td><a href="comments?del_comment_id=<?= $id; ?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php
                            $k++;
                        }
                    }
                    else{
                        echo "<h3>No Comment Found</h3>";
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
