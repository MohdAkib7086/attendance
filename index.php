<?php

if(isset($_SESSION['passed_default']) && $_SESSION['passed_default'])
{
//Show desired page
header('Location:home.php');
}
else
{
    header('Location:log/login.php');
}
?>