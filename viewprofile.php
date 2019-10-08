<?php
session_start();
$user=$_SESSION['user'];
include('dbconnect.php');
$sql="SELECT * from user WHERE email='$user'";
if($result = mysqli_query($conn, $sql)){
    $row=mysqli_fetch_array($result);
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
                <form>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" disabled id="email" name="name" value="<?php echo $row['email'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" disabled id="name" name="name" value="<?php echo $row['name'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date of Birth:</label>
                        <input type="date" class="form-control" disabled id="date" name="date" value="<?php echo $row['dob'] ?>" />
                    </div>
                </form>
            </div>      
</html>