<?php
session_start();
$user=$_SESSION['user'];
include('dbconnect.php');

if(isset($_POST['submit'])){
    $sql="SELECT * from user WHERE email='$user'";
    if($result = mysqli_query($conn, $sql)){
        $row=mysqli_fetch_array($result);
    }
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2']; 
    $pass3=$_POST['pass3'];
    if($pass1==$row['password'])
    {
        if($pass2==$pass3)
        {
            $sql="UPDATE user SET password='$pass2' WHERE email='$user'";
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>
            alert('Successful');
            window.location='viewprofile.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Update failed! Password did not match.');
            </script>";
        }
    }
    else{
        echo "<script type='text/javascript'>
        alert('Update failed! Wrong Password.');
        </script>";
    }
}


?>
<html>
        <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
                <link rel="stylesheet" href="css/bootstrap.min.css" />
                <script src="js/jquery.min.js"></script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
            </head>
        <div class="col-md-10" style="margin: 50px">
                <form autocomplete="off" action="changepass.php" method="POST" >
                    <div class="form-group">
                        <label for="pass1">Enter Current Password:</label>
                        <input type="password" class="form-control" required id="pass1" name="pass1" autocomplete="new-password"/>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Enter New Password:</label>
                        <input type="password" class="form-control" required id="pass2" name="pass2"  />
                    </div>
                    <div class="form-group">
                        <label for="date">Confirm New Password:</label>
                        <input type="password" class="form-control" required  id="pass3" name="pass3"/>
                    </div>
                    <button class="btn btn-block btn-primary" type="submit" name="submit">Change Password</button>
                </form>
            </div>      
</html>