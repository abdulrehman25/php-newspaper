<div class="popular-news-widget mb-30">
    <h3>4 Most Popular News</h3>

    <!-- Single Popular Blog -->
    <?php
    $query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY views DESC LIMIT 4";
    $res = mysqli_query($conn,$query);
    $count = mysqli_num_rows($res);
    $count2 = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($res)){
            $id = $row['id'];
            $title = $row['title'];
            $date = getdate($row['date']);
            $day = $date['mday'];
            $month = $date['month'];
            $year = $date['year'];
            ?>
            <div class="single-popular-post">
                <a href="single-post?post_id=<?= $id;?>">
                    <h6><span><?= $count2;?>.</span> <?= $title;?></h6>
                </a>
                <p><?= $month.' '.$day.','.$year;?></p>
            </div>
            <?php
            $count2++;
        }
    }
    ?>
</div>