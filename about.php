<?php
    require_once 'inc/db.php';
    require_once 'inc/head.php';
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

    <!-- ##### About Area Start ##### -->
    <section class="about-area">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>A young and professional team</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lec tus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur, purus imperdiet volutpat tincidunt, eros sem mollis quam, ut placerat urna neque at massa. Proin vitae pulvinar justo. Donec vel placerat enim, at ultricies risus.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <p>Donec gravida non metus blandit facilisis. Cras tincidunt, lorem aliquam molestie eleifend, libero dui volutpat dui, nec sodales massa libero ut metus. Mauris pretium elit ut dapibus consequat. Nam ut lorem nec sem dignissim gravida. Duis fringilla.</p>
                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex.</p>
                </div>
            </div>

            <div class="row align-items-center mt-80">
                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact d-flex align-items-center">
                        <h3><span class="counter">12</span>K</h3>
                        <div class="cf-text">
                            <h6>News Article</h6>
                            <span>Donec turpis erat, scelerisq</span>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact d-flex align-items-center">
                        <h3><span class="counter">45</span></h3>
                        <div class="cf-text">
                            <h6>Reporters</h6>
                            <span>Donec turpis erat, scelerisq</span>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact d-flex align-items-center">
                        <h3><span class="counter">25</span></h3>
                        <div class="cf-text">
                            <h6>Awards Won</h6>
                            <span>Donec turpis erat, scelerisq</span>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Fact -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact d-flex align-items-center">
                        <h3><span class="counter">17</span></h3>
                        <div class="cf-text">
                            <h6>Years Old</h6>
                            <span>Donec turpis erat, scelerisq</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Team Area Start ##### -->
    <section class="newspaper-team mb-30">
        <div class="container">
            <div class="row">

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t1.jpg" alt="">
                        <div class="team-info">
                            <h5>James Williams</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t2.jpg" alt="">
                        <div class="team-info">
                            <h5>Christinne Smith</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t3.jpg" alt="">
                        <div class="team-info">
                            <h5>Alicia Dormund</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t4.jpg" alt="">
                        <div class="team-info">
                            <h5>Steve Duncan</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t5.jpg" alt="">
                        <div class="team-info">
                            <h5>James Williams</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t6.jpg" alt="">
                        <div class="team-info">
                            <h5>Christinne Smith</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t7.jpg" alt="">
                        <div class="team-info">
                            <h5>Alicia Dormund</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-team-member">
                        <img src="img/bg-img/t8.jpg" alt="">
                        <div class="team-info">
                            <h5>Steve Duncan</h5>
                            <h6>Senior Editor</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
        require_once 'inc/footer.php';
    ?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <?php
        require_once 'inc/scripts.php';
    ?>