<?php
session_start();
if (isset($_POST['submit'])) {
    $loc = preg_split("/\./", $_FILES["file"]["name"]);
    $_FILES['file']['name'] = $_SESSION['user'] . ".png";
    $target_file = "images/user/" . $_FILES['file']['name'];
    echo $target_file;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "<script type='text/javascript'>
                    alert('Profile picture updated!')
                    window.location='profile.php';
                  </script>";
    } else {
        echo "<script type='text/javascript'>
                    alert('Failed! Try again later.')
                    window.location='profile.php';
                  </script>";
    }
} else {
    echo "<script type='text/javascript'>
                    alert('Please select a valid image.')
                    window.location='profile.php';
                  </script>";
}
