<?php
    require_once 'inc/db.php';
    require_once 'inc/head.php';
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $sql0 = "SELECT * FROM categories WHERE id = $cat_id";
        $res0 = mysqli_query($conn,$sql0);
        $row0 = mysqli_fetch_array($res0);
        $cat = $row0['category'];
    }

    //Get Page
    if(isset($_GET['page_id'])){
        $page = $_GET['page_id'];
    }else{
        $page = 1;
    }

    $ppp = 2;
    $sql = "SELECT * FROM posts WHERE status = 'publish' AND category = '$cat'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    $pages = ceil($count/$ppp);

    $psf = ($page - 1) * $ppp;
?>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <?php
            require_once 'inc/top-header.php';
        ?>

        <!-- Navbar Area -->
        <?php
            require_once 'inc/navbar.php';
        ?>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">
                        <div class="news-title">
                            <p>Breaking News</p>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Welcome to Colorlib Family.</a></li>
                                <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center mt-15">
                        <div class="news-title title2">
                            <p>International</p>
                        </div>
                        <div id="internationalTicker" class="ticker">
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                <li><a href="#">Welcome to Colorlib Family.</a></li>
                                <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hero Add -->
                <div class="col-12 col-lg-4">
                    <div class="hero-add">
                        <a href="#"><img src="img/bg-img/hero-add.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <?php

                            $query = "SELECT * FROM posts WHERE status = 'publish' AND category = '$cat' ORDER BY id DESC  LIMIT $psf,$ppp";
                            $res = mysqli_query($conn,$query);
                            $count = mysqli_num_rows($res);


                            if($count > 0){
                                while($row = mysqli_fetch_array($res)){
                                    $id = $row['id'];
                                    $image = $row['image'];
                                    $category = $row['category'];
                                    $sql2 = "SELECT * FROM categories WHERE category ='$category'";
                                    $res4 = mysqli_query($conn,$sql2);
                                    $row5 = mysqli_fetch_array($res4);
                                    $cat_id1 = $row5['id'];
                                    $author = $row['author'];
                                    $title = $row['title'];
                                    $post_data = $row['post_data'];
                                    $views = $row['views'];
                        ?>
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="single-post?post_id=<?= $id;?>"><img src="img/bg-img/<?= $image;?>" alt="" style="width: 100%; height: 400px;"></a>
                            </div>
                            <div class="post-data">
                                <a href="catagories-post?cat_id=<?= $cat_id1;?>" class="post-catagory"><?= $category;?></a>
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
                                echo '<h3>No post found</h3>';
                            }

                        ?>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination mt-50">
                            <?php for($i=1;$i<=$pages;$i++){?>
                            <li class="page-item <?=(($page == $i)?'active':'')?>">
                                <a class="page-link" href="catagories-post?cat_id=<?=$cat_id?>&page_id=<?= $i?>"><?= $i?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">

                            <!-- Single Featured Post -->
                            <?php
                                require_once 'inc/sidebar.php';
                            ?>
                        </div>

                        <!-- Popular News Widget -->
                        <?php
                            require_once 'inc/4-most-popular-posts.php';
                        ?>

                        <!-- Newsletter Widget -->
                        <?php
                            require_once 'inc/newsletter.php';
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    require_once 'inc/footer.php';
    ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <?php
        require_once 'inc/scripts.php';
    ?>