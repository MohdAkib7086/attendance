<?php include_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        .navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }
    </style>
</head>
<body>
<?php include_once("nav.php"); ?>   
<div class="panel panel-default container">

<div class="panel-heading">
    <h1 style="text-align: center;">Attendance Mangement System</h1>
    <h2 style="text-align: center;">Add new student</h2>
</div>

<div class="panel-body">


<div class="container register">
    
  <div class="row">
      <form action="" method="POST">
          <div class="col-lg-8">
         
          <br>  
          <div class="form-group">
              <input type="text" class="form-control"
              placeholder="Enter your name*" name="name"
              value="" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control"
              placeholder="Father Name*" name="fname"
              value="" required>
            </div>

            <div class="form-group">
              <input type="email" class="form-control"
              placeholder="email*" name="email"
              value="" required>
            </div>
          </div>
          </div>
            <input type="submit"
            name="submit" class="btn btn-primary">
     
      </form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $email=$_POST['email'];

  $insertquery = " insert into emp(
    name,fname,email) values('$name','$fname','$email') ";
    $res = mysqli_query($link,$insertquery);
    if($res){
      ?>
      <script>
        alert("data inserted properly");
      </script>
      <?php
    }else {
      ?>
      <script>
        alert("data not inserted properly");
      </script>
      <?php
    }
}

?>