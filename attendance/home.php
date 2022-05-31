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
    <h1 style="text-align: center;">Attendance Mangement System</h1><br>
    <h2 style="text-align: center;">Attendance of date: <?php echo date('d-m-y'); ?></h2><br>
</div>

<div class="panel-body">

<form method="post">
<table class="table">

<thead>

<tr>
    <th>Name</th>
    <th>Father Name</th>
    <th>Email</th>
    <th>Attendance</th>
</tr>

</thead>



<tbody>


<?php
     
     $query="select * from emp";
     $result=$link->query($query);
     while($show=$result->fetch_assoc()){



?>

<tr>
    <td><?php echo $show['name']; ?></td>
    <td><?php echo $show['fname']; ?></td>
    <td><?php echo $show['email']; ?></td>
    <td>
    Present<input type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Present">
    Absent <input type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent">
    </td>
</tr>
<?php }?>
    </table>
    <input class="btn btn-primary" Type="submit" name="submit" value="Take Attendance">
    </form>

</div>


<div class="panel-footer">


</div>

</body>
</html>



<?php
if(isset($_POST['submit'])){
  $att=$_POST['attendance'];
  $date=date('d-m-y');

  $query="select distinct date from attendance";
  $result = mysqli_query($link,$query);
  $b=false;
    if($result->num_rows>0){
      while($check=$result->fetch_assoc()){
        if($date==$check['date']){
            $b=true;
            echo "<div class='alert alert-danger'>
                Attendance already taken today!!!;
            </div>";

        }
    }
  }

    if(!$b){
      foreach($att as $key => $value){
        if ($value=="Present"){
            $insertquery="insert into attendance(value, emp_id,date) values('Present','$key','$date')";
            $res = mysqli_query($link,$insertquery);
        }
        else{
           $insertquery="insert into attendance(value, emp_id,date) values('Absent','$key','$date')";
           $res = mysqli_query($link,$insertquery);
        }   
      } 
          if($res){
            echo "<div class='alert alert-success'>
                                      Attendance taken successfully!!!;
                                  </div>";
          }else {
            ?>
            <script>
              alert("data not inserted properly");
            </script>
            <?php
          }
    }

}

?>