<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "you are logged out";
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('links.php'); ?>
  <title>Bootstrap 4 Example</title>
</head>
<body>
    <p><a href="logout.php">logout</a></p>
    <h1>Welcome to my world Mr <?php echo $_SESSION['username']; ?></h1>
</body>