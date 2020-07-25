<?php
    require_once 'inc/head.php';
    require_once 'inc/header.php';

    if(!isset($_SESSION['username'])){
        header('Location:login');
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
                <h3><i class="fa fa-"></i> Dashboard</h3>

            </div>
        </div>
    </div>
<?php
    require_once 'inc/footer.php';
?>
