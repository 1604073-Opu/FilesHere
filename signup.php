<?php
if (!isset($_POST['submit'])) { 
    header("location:index.php");
  }
session_start();
include('dbconnect.php');
if (mysqli_connect_errno($conn) == false) {
    $email = $_SESSION['email'];
    $_SESSION['user']=$email;
    $name = $_POST['name'];
    $password=$_POST['password'];	
    $date = $_POST['date'];
    mysqli_query($conn, "INSERT INTO user(email,password,name,dob) VALUES('$email','$password','$name','$date')");
    session_destroy();
    echo "<script type='text/javascript'>
    alert('Sign up successful! Please Login now.');
    window.location='index.php#login';
    </script>";
} else {
    echo "<script type='text/javascript'>
    alert('Error! Try again.');
    window.location='signup.html';
    </script>";
}
?>
