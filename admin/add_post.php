<?php
require_once 'inc/head.php';
require_once 'inc/header.php';

//get id of post to edit it
if (isset($_GET['edit_post_id'])){
    $edit_post_id = $_GET['edit_post_id'];

    //fetching data of post
    $edit_sql      = "SELECT * FROM posts WHERE id ='$edit_post_id'";
    $edit_sql_res  = mysqli_query($conn,$edit_sql);
    $edit_sql_row  = mysqli_fetch_array($edit_sql_res);
    $title    = $edit_sql_row['title'];
    $tags     = $edit_sql_row['tags'];
    $picture  = $edit_sql_row['image'];
    $db_img = $picture;
    $status   = $edit_sql_row['status'];
    $category = $edit_sql_row['category'];
    $des      = $edit_sql_row['post_data'];
    if (isset($_POST['edit_post'])){
        $title = $_POST['title'];
        $tags = $_POST['tags'];
        $date = time();
        $picture = $_FILES['pic']['name'];
        $temp = $_FILES['pic']['tmp_name'];
        $unique = substr($date,7,3);
        $target = $unique.$picture;
        $status = $_POST['status'];
        $category1 = $_POST['category'];
        $des = $_POST['des'];

        if (empty($picture)){
            $target = $db_img;
        }
        else{
            unlink('../img/bg-img/'.$db_img);
        }

        if(empty($title) || empty($des) || empty($status) || empty($tags)){
            $error_message1 = '<span class="text-danger">All * Fields are required</span>';
        }
        else{
            $query = "UPDATE `posts` SET `image`='$target',`category`='$category1',`title`='$title',`post_data`='$des',`tags`='$tags',`date`='$date',`status`='$status' WHERE id='$edit_post_id'";
            if (mysqli_query($conn,$query)){
                $success_msg_update = '<span class="text-success">Post Updated Successfully</span>';
                move_uploaded_file($temp,"../img/bg-img/".$target);
            }

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
                if(isset($_POST['submit_post'])){
                    $title = $_POST['title'];
                    $tags = $_POST['tags'];
                    $date = time();
                    $picture = $_FILES['pic']['name'];
                    $temp = $_FILES['pic']['tmp_name'];
                    $unique = substr($date,7,3);
                    $picture = $unique.$picture;
                    $status1 = $_POST['status'];
                    //to get the author name
                    $author_username = $_SESSION['username'];
                    $author_sql = "SELECT `first_name`,`last_name` , `image` FROM `user` WHERE username = '$author_username'";
                    $author_sql_res = mysqli_query($conn,$author_sql);
                    $author_row = mysqli_fetch_array($author_sql_res);
                    $first = $author_row['first_name'];
                    $last = $author_row['last_name'];
                    $author_name = $first.' '.$last;
                    $author_image = $author_row['image'];

                    $category1 = $_POST['category'];
                    $des = $_POST['des'];

                    if(empty($title) || empty($picture) || empty($des) || empty($status1) || empty($tags) || empty($picture)){
                        $error_message1 = '<span class="text-danger">All * Fields are required</span>';
                    }
                    else{
                        $query1 = "INSERT INTO `posts`(`image`, `category`, `title`, `author`, `post_data`, `tags`, `author_image`, `date`, `status`, `views`) VALUES 
                                                      ('$picture','$category1', '$title', '$author_name', '$des', '$tags','$author_image', '$date', '$status1', 0);";
                       if (mysqli_query($conn,$query1)){
                           $success_msg1 = '<span class="text-success">Post Submitted Successfully</span>';
                           move_uploaded_file($temp,"../img/bg-img/".$picture);
                           header('refresh:3;url=add_post');
                       }

                    }
                }
                ?>
                <h3><i class="fa fa-file"></i> <?=((isset($_GET['edit_post_id']))?'Edit':'Add')?> Post</h3>
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
                    elseif (isset($success_msg_update)){
                        echo $success_msg_update;
                        header("refresh:3;url=all_posts");
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title <i class="text-danger">*</i></label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php if (isset($title)){echo $title;}?>">
                    </div>
                    <div class="form-group">
                        <label>Tags <i class="text-danger">*</i></label>
                        <input type="text" name="tags" class="form-control" placeholder="Tags" value="<?php if (isset($tags)){echo $tags;}?>">
                    </div>
                    <div class="form-group">
                        <label>Picture <i class="text-danger">*</i></label>
                        <input type="file" name="pic" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status <i class="text-danger">*</i></label>
                        <select name="status" class="form-control" >
                            <option value="">Select Status</option>
                            <option value="publish" <?php if (isset($status) && $status == 'publish'){echo 'selected';}?>>Publish</option>
                            <option value="draft" <?php if (isset($status) && $status == 'draft'){echo 'selected';}?>>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category <i class="text-danger">*</i></label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                                $sql0 = "SELECT * FROM categories";
                                $res0 = mysqli_query($conn,$sql0);
                                $count0 = mysqli_num_rows($res0);
                                if ($count0 > 0){
                                    while ($row0 = mysqli_fetch_array($res0)){
                                        $cat_id = $row0['id'];
                                        $category0 = ucfirst($row0['category']);
                            ?>
                            <option value="<?= $category0;?>" <?php if (isset($category) && $category == $category0){echo 'selected';}?>><?= $category0;?></option>
                            <?php
                                    }
                                }
                                else{
                                    echo '<option>No Category Exist</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description <i class="text-danger">*</i></label>
                        <textarea name="des" class="form-control" rows="5" >
                            <?php if (isset($des)){echo $des;}?>
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-success rounded-0" name="<?=((isset($_GET['edit_post_id']))?'edit_post':'submit_post')?>" value="<?=((isset($_GET['edit_post_id']))?'Edit':'Add')?> Post">
                </form>
            </div>
        </div>
    </div>
<?php
require_once 'inc/footer.php';
?>