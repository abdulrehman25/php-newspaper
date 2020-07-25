<div class="col-12 col-lg-8">
    <div class="section-heading">
        <h6>Popular News</h6>
    </div>

    <div class="row">

        <!-- Single Post -->
        <?php
            $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY views DESC LIMIT 4";
            $res = mysqli_query($conn,$query);
            $count = mysqli_num_rows($res);
            if($count > 0){
                while ($row = mysqli_fetch_array($res)){
                    $id = $row['id'];
                    $image = $row['image'];
                    $title = $row['title'];
                    $category = $row['category'];
                    $sql2 = "SELECT * FROM categories WHERE category ='$category'";
                    $res4 = mysqli_query($conn,$sql2);
                    $row5 = mysqli_fetch_array($res4);
                    $cat_id = $row5['id'];
                    $views = $row['views'];
        ?>
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
                <div class="post-thumb">
                    <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="catagories-post?cat_id=<?= $cat_id;?>" class="post-catagory"><?= $category;?></a>
                    <a href="single-post?post_id=<?= $id;?>" class="post-title">
                        <h6><?= $title;?></h6>
                    </a>
                    <div class="post-meta d-flex align-items-center">
                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span><?= $views;?></span></a>
                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
</div>