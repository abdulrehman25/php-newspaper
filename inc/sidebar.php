    <!-- Single Featured Post -->
    <?php
        $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY id DESC LIMIT 6";
        $res = mysqli_query($conn,$query);
        $count = mysqli_num_rows($res);
        if($count > 0){
            while($row = mysqli_fetch_array($res)){
                $id = $row['id'];
                $image = $row['image'];
                $title = $row['title'];
                $category = $row['category'];
                $sql2 = "SELECT * FROM categories WHERE category ='$category'";
                $res4 = mysqli_query($conn,$sql2);
                $row5 = mysqli_fetch_array($res4);
                $cat_id = $row5['id'];
                $date = getdate($row['date']);
                $hour = $date['hours'];
                $month = $date['month'];
                $day = $date['mday'];
    ?>
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt=""></a>
        </div>
        <div class="post-data">
            <a href="catagories-post?cat_id=<?= $cat_id;?>" class="post-catagory"><?= $category;?></a>
            <div class="post-meta">
                <a href="single-post?post_id=<?= $id;?>" class="post-title">
                    <h6><?= $title;?></h6>
                </a>
                <p class="post-date"><span><?= $hour;?> AM</span> | <span><?= $month.' '.$day;?></span></p>
            </div>
        </div>
    </div>
    <?php
            }
        }

    ?>
