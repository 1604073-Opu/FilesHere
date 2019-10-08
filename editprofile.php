<?php
session_start();
$user = $_SESSION['user'];
include('dbconnect.php');$sql = "SELECT * from user WHERE email='$user'";
if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_array($result);
}
$password = $row['password'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dob = $_POST['date'];
    $pass = $_POST['password'];
    if ($pass== $password) {
        $sql = "UPDATE user SET name='$name' , dob='$dob' WHERE email='$user'";
        mysqli_query($conn, $sql);
        $sql = "SELECT * from user WHERE email='$user'";
        if ($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_array($result);
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
    <meta charset=" utf - 8 " />
    <meta name=" viewport " content=" width = device - width, initial - scale = 1 " />
    <link rel=" icon " href="images/logo/banner.png " type="image/x-icon">
    <link rel=" stylesheet " href="css/bootstrap.min.css " />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="col-md-10" style="margin: 50px">
        <form action="editprofile.php" method="POST">
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" class="form-control" disabled id="email" name="email" value="<?php echo $row['email'] ?>" />
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"  id="name" name="name" value="<?php echo $row['name'] ?>" />
            </div>
            <div class="form-group">
                <label for="date">Date of Birth:</label>
                <input type="date" class="form-control"  id="date" name="date" value="<?php echo $row['dob'] ?>" />
            </div>
            <div class="modal fade" id="confirm">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm Update</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" required name="password" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-block">
                                Confirm
                            </button>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <button class="btn btn-block btn-success" data-toggle="modal" data-target="#confirm">
            Update
        </button>

    </div>

</body>

</html>

