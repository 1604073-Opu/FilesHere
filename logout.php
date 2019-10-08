<?php
session_start();
if($_GET['logout']==1){
    session_destroy();
    unset($_COOKIE['user']);
    setcookie("user", null, time() - 3600,'/');
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
else 
{
    echo "<script type='text/javascript'>
    window.location='home.php';
    </script>";
}
?>