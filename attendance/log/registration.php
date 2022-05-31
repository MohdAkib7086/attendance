<?php
session_start();
?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <?php include('links.php'); ?>
  <title>Bootstrap 4 Example</title>
</head>

<body>
  <?php 
  include 'connection.php';
  if(isset($_POST['submit'])){
     $username = mysqli_real_escape_string($con,$_POST['username']);
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
     $password = mysqli_real_escape_string($con,$_POST['password']);
     $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

     $pass=password_hash($password,PASSWORD_BCRYPT);
     $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

     $emailquery = "select * from registration where email='$email' ";
     $query=mysqli_query($con,$emailquery);

     $emailcount = mysqli_num_rows($query);

     if($emailcount > 0){
       echo "email already exist";
     }else{
       if($password === $cpassword){
          $insertquery="insert into registration(
           username, email, mobile, password, cpassword) values
           ('$username','$email','$mobile','$pass','$cpass')";

           $iquery = mysqli_query($con, $insertquery);
        if($iquery){
            ?>
            <script>
             alert("insert successfull");
            </script>
        <?php
        }
        else{
          ?>
          <script>
          alert("not inerted");
          </script>
          <?php
        }
       }else{
         echo "password are not matching";
       }
     }
  }
  ?>
  <div class="container register">
    <h1>Create Account</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" 
        placeholder="Full name" name="username" 
        value="" required>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" 
        placeholder="Email address" name="email" 
        value="" required>
      </div>

      <div class="form-group">
        <input type="tel" class="form-control" 
        placeholder="Phone Number" name="mobile" 
        value="" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" 
        placeholder="Create password" name="password" 
        value="" required>
      </div>

      <div class="form-group">
        <input type="password" class="form-control" 
        placeholder="Repeat password" name="cpassword" 
        value="" required>
      </div>

      <input type="submit" class="btnRegister" 
      name="submit" value="register">
  
    </form>
    <p>Already have account <a href="login.php">login here</a></p>
 </div>

</body>

</html>

