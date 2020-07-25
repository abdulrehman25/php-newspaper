<?php
    require_once 'inc/head.php';
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $log_sql = "SELECT * FROM user WHERE username = '$username'";
        $log_res = mysqli_query($conn,$log_sql);
        $log_row = mysqli_fetch_array($log_res);
        $db_username = $log_row['username'];
        $db_password = $log_row['password'];
        $db_role = $log_row['role'];
        if($username == $db_username && $password == $db_password){
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
            header('Location:index');
        }
        else{
            $error = "Data Not Matched";
        }
    }
?>
<body class="bg-secondary">
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-4 offset-4 mt-5">
            <form action="" class="border  mt-5 p-3" method="post">
                <h4 class="text-light">Login <span class="float-right text-danger"><?php if(isset($error)){echo $error;}?></span></h4>
                <div class="form-group">
                    <label  class="text-light">Username</label>
                    <input type="text" name="username" class="form-control">
                    <label for="" class="text-light">Password</label>
                    <input type="password" name="password" class="form-control">
                    <input type="submit" value="Login" name="login" class="btn btn-success mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>