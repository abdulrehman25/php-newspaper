<?php
if(isset($_POST['subscribe'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    if(empty($name) || empty($email)){
        $error_message = '<span class="text-danger">All Fields Are Required</span>';
    }
    else{
        $query = "INSERT INTO `subscribers_list`(`name`, `email`) VALUES 
                                                        ('$name','$email')";
        $res = mysqli_query($conn,$query);
        $success_msg = '<span class="text-success">Request Submitted</span>';
    }
}
?>
<div class="newsletter-widget">
    <?php
    if(isset($error_message)){
        echo $error_message;
    }
    elseif (isset($success_msg)){
        echo $success_msg;
        header('Refresh:5');
    }
    ?>
    <h4>Newsletter</h4>
    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="subscribe" class="btn w-100">Subscribe</button>
    </form>
</div>
