<?php require "head.php"; ?>
    <div class="container my-5 pb-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-offset-4 col-md-4">
            <div class="text-center"><img class="logo text-center mx-auto" src="images/site/gray.png" width="300" height="250"></div>
            
            <h3 class="login-heading" id="login-heading">LOG IN</h3>
            <!-- Form Start -->
            <form  action="" method ="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="username" class="form-control" placeholder="" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <input id="login-btn" type="submit" name="submit" class="btn btn-secondary" value="login" />
            </form>
            <div class="text-center"><a href="add-users.php">Create New Account</a></div>
            <!-- /Form  End -->
        </div>
    </div>
</div>
<?php 
    if(isset($_REQUEST['submit'])){
        include "config.php";
        // $email = mysqli_real_escape_string($connection,$_REQUEST['username']);
        $email = $_REQUEST['username'];
        // $password = md5($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, md5($_REQUEST['password']));
        $sql = "SELECT * FROM user WHERE email ='{$email}' AND password ='{$password}'";
        $result = mysqli_query($connection,$sql) or die('Query Failed');
        if(mysqli_num_rows($result) > 0){
            while($info = mysqli_fetch_assoc($result)){
              session_start();
                $_SESSION['user_id'] = $info['user_id'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['password'] = $info['password'];
                $_SESSION['usename'] = $info['username'];
                $_SESSION['user_role'] = $info['user_id'];

                header("location:profile.php");
            }
        }else{
          echo '<div class="alert alert-danger">Username and Password are not found </div>';
        }
    }

?>
<?php require 'footer.php'; ?>