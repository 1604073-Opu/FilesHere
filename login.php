<?php
if (!isset($_POST['submit'])) {
  header("location:index.php");
}
include('dbconnect.php');
if (mysqli_connect_errno($conn) == false) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $data = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
  if ($data->num_rows == 0) {
    echo "<script type='text/javascript'>alert('We could not find this email in our server!');
          window.location='index.php';
          </script>";
  } else {
    $pass = mysqli_fetch_array($data)['password'];
    if ($pass != $password) {
      echo "<script type='text/javascript'>alert('Wrong Password!');
          window.location='index.php';
          </script>";
    } else {
      session_start();
      $_SESSION['user'] = $email;
      if (isset($_POST['rememberme'])) {
        $remember = $_POST['rememberme'];
        if ($remember == "on") {
          setcookie('user', $email, time() + (86400 * 30), "/");
        }
      }
      echo "<script type='text/javascript'>
          window.location='home.php';
          </script>";
    }
  }
} else {
  echo "<script type='text/javascript'>alert('Network Error!');
          window.location='index.php';
          </script>";
}
