<?php include "head.php"; ?>
<?php
    if(isset($_REQUEST['save'])){
       include "config.php";
  
       $name= mysqli_real_escape_string($connection,$_REQUEST['name']);
       $username = mysqli_real_escape_string($connection,$_REQUEST['username']);
       $email = mysqli_real_escape_string($connection,$_REQUEST['email']);
       $phone = mysqli_real_escape_string($connection,$_REQUEST['phone_num']);
       $password = mysqli_real_escape_string($connection, md5($_REQUEST['password']));
       $confirm_password = mysqli_real_escape_string($connection, md5($_REQUEST['confirm_password']));


       if($password ==  $confirm_password){
            $sql = "SELECT username FROM user WHERE username ='{$username}'";
           $result = mysqli_query($connection,$sql) or die("Query Failed");
           
           if(mysqli_num_rows($result) > 0){
               echo "<p style='color: red; text-align:center; margin: 10px;'> username already exist </p>";
            }else{
                 $sql1= "INSERT INTO user(name, username, email, phone, password) VALUES ('{$name}','{$username}','{$email}','{$phone}','{$password}')";
                 $result1 = mysqli_query($connection,$sql1) or die('Query1 Failed');
                 if($result1){
                     header('location:index.php');
                 }
            }
      }else{
          echo "Password doesn't match";
       }
   }


?>
  <div id="admin-content">
      <div class="container my-5 py-5">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <h1 class="admin-heading text-center">Create Account</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="name" required>
                      </div>
                      <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone_num" class="form-control" placeholder="Phone" required>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>

                      <div class="form-group mb-3">
                          <label>Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                      </div>
                      
                      <input type="submit"  name="save" class="btn btn-success" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>