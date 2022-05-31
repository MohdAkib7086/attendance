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
    <h2 style="text-align: center;">Attendance of date: <?php
       if($_GET){
           $date=$_GET['date'];
           ?>
           <p style="font-weight: bold; color:Blue"><?php echo $date ?></p>
           <?php
       }?></h2>
</div>

<div class="panel-body">
   

<form method="post">
<table class="table">

<thead>

<tr>
    <th>Sr No.</th>
    <th>Name</th>
    <th>Father Name</th>

    <th>Email</th>
    <th>Attendance</th>
</tr>

</thead>
       <?php
       if($_GET){
           $date=$_GET['date'];
           
            $query="SELECT emp.*,attendance.* FROM attendance
            inner join emp on attendance.emp_id=emp.emp_id and attendance.date='$date'";
            $result=$link->query($query);

            if ($result->num_rows>0){
                $i=0;
                while($val=$result->fetch_assoc()){
                    $i++;
       ?>
<tr>
    <td><?php echo $i; ?></td>

    <td><?php echo $val['name'];?></td>

    <td><?php echo $val['fname'];?></td>

    <td><?php echo $val['email'];?></td>

    <td>
       
        <?php
        if($val['value']=='Present'){?>
        <p style="color:Green">Present</p>
        <?php }?>
        
        <?php
        if($val['value']=='Absent'){?>
        <p style="color:Red">Absent</p>
        <?php }?>
        
    </td>

</tr>
<?php } } } ?>



</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>