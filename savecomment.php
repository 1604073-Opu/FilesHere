<?php
session_start();
$id=$_SESSION['comid'];
$user=$_SESSION['user'];
$com=$_POST['comment'];
$sql="INSERT INTO comments (file,user,com) VALUES ('$id','$user','$com')";
include("dbconnect.php");
mysqli_query($conn,$sql);
header("location:forum.php?id=$id");
?>