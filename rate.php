<?php
session_start();
$user=$_SESSION['user'];
$id=$_SESSION['currentitem'];
$rate=$_GET['rating'];
include("dbconnect.php");
$sql="SELECT rate from download WHERE file=$id and user='$user'";
$res=mysqli_query($conn,$sql);
if($res->num_rows==0){
    $r=0;
    $p=0;
}
else{
    $row=mysqli_fetch_array($res);
    $r=$row['rate'];
    if($r==0)
        $p=0;
    else $p=1;
}
$sql="UPDATE files SET rating=rating-$r+$rate , rater=rater-$p+1 WHERE id=$id";
echo $sql;
mysqli_query($conn,$sql);
$sql="INSERT INTO download (file,user,rate) VALUES('$id','$user','$rate') ON DUPLICATE KEY UPDATE rate=$rate";
mysqli_query($conn,$sql);
header("location:forum.php?id=$id");
?>