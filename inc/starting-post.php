<?php
//$sql0 = "SELECT * FROM categories WHERE id = $cat_id";
//$res0 = mysqli_query($conn,$sql0);
//$row0 = mysqli_fetch_array($res0);
//    if(isset($_GET['cat_id'])){
//        $cat_id = $_GET['cat_id'];
//        $sql0 = "SELECT * FROM categories WHERE id = $cat_id";
//        $res0 = mysqli_query($conn,$sql0);
//        $row0 = mysqli_fetch_array($res0);
//        $cat_i = $row0['id'];
//    }
//?>
<div class="col-12 col-md-6 col-lg-8">
    <div class="row">
        <!-- Single Featured Post -->
        <div class="col-12 col-lg-7">
            <?php
                $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY id DESC LIMIT 1";
                $res = mysqli_query($conn,$query);
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_array($res)){
                    $id = $row['id'];
                    $category = $row['category'];
                    $sql = "SELECT * FROM categories WHERE category ='$category'";
                    $res2 = mysqli_query($conn,$sql);
                    $row2 = mysqli_fetch_array($res2);
                    $cat_id = $row2['id'];
                    $image = $row['image'];
                    $views = $row['views'];
                    $author = $row['author'];
                    $post_data = substr($row['post_data'],0,150);
                    $title = $row['title'];
            ?>
            <div class="single-blog-post featured-post">
                <div class="post-thumb">
                    <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="catagories-post?cat_id=<?= $cat_id?>" class="post-catagory"><?= $category;?></a>
                    <a href="single-post?post_id=<?= $id;?>" class="post-title">
                        <h6><?= $title;?></h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-author">By <a href="#"><?= $author;?></a></p>
                        <p class="post-excerp"><?= $post_data;?></p>
                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center">
                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?= $views;?></span></a>
                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                else{
                    echo 'No Post Found';
                }
            ?>
        </div>

        <div class="col-12 col-lg-5">
            <!-- Single Featured Post -->
            <?php
            $query = "SELECT * FROM posts WHERE status = 'publish' AND id < (SELECT MAX(id) FROM posts) ORDER BY id DESC LIMIT 2";
            $res = mysqli_query($conn,$query);
            $count = mysqli_num_rows($res);
            if($count > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    $id = $row['id'];
                    $category = $row['category'];
                    $sql1 = "SELECT * FROM categories WHERE category ='$category'";
                    $res3 = mysqli_query($conn,$sql1);
                    $row3 = mysqli_fetch_array($res3);
                    $cat_id1 = $row3['id'];
                    $image = $row['image'];
                    $views = $row['views'];
                    $author = $row['author'];
                    $post_data = $row['post_data'];
                    $title = $row['title'];
                    ?>
                    <div class="single-blog-post featured-post-2">
                        <div class="post-thumb">
                            <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="catagories-post?cat_id=<?= $cat_id1;?>" class="post-catagory"><?= $category;?></a>
                            <div class="post-meta">
                                <a href="single-post?post_id=<?= $id;?>" class="post-title">
                                    <h6><?= $title;?></h6>
                                </a>
                                <!-- Post Like & Post Comment -->
                                <div class="d-flex align-items-center">
                                    <a href="#" class="post-like"><img src="img/core-img/like.png" alt="">
                                        <span><?= $views;?></span></a>
                                    <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt="">
                                        <span>10</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                echo 'No Post Found';
            }
            ?>
        </div>
    </div>
</div>