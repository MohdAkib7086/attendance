<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'attnd';

$con=mysqli_connect($server,$username,$password,$db);

if($con){
    // echo "connection successfull";
    ?>
<script>
alert("connection successfull");
</script>
<?php
}
else{
    // echo "no connection";
    die("no connection".mysqli_connect_error());
}

?>