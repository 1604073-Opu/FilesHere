<?php
session_start();
include('dbconnect.php');
$user = $_SESSION['user'];
$id = $_GET['id'];
$myFile = $_GET['loc'];
$link="window.location='delete.php?id=$id&loc=$myFile&submit=true'";
$linkno="window.location='delete.php?id=$id&loc=$myFile&no=true'";
if (isset($_GET["submit"])) {
    $sql = "DELETE FROM files WHERE user='$user' and id='$id'";
    unlink($myFile) or die("Couldn't delete file");
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
            alert('Successful');
            window.location='history.php?type=up';
        </script>";
    }
}
else if(isset($_GET["no"])) echo "<script type='text/javascript'>
    window.location='history.php?type=up';
</script>";

?>
<head>
    <meta charset="utf-8"/>
    <meta name=" viewport " content=" width = device - width, initial - scale = 1 " />
    <link rel=" icon " href="images/logo/banner.png " type="image/x-icon">
    <link rel=" stylesheet " href="css/bootstrap.min.css " />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<html>
    <div class="col-md-9" style="position: fixed; top: 25%; left: 30%;">
    <div class="modal-body">
        <h3>ARE YOU SURE?</h3>
        <button type="submit" name="submit" class="btn btn-danger" onclick="<?php echo $link; ?>">
            YES
        </button>
        <button type="submit" name="no" class="btn btn-warning"onclick="<?php echo $linkno; ?>">
            NO
        </button>
    </div>
</div>
</html>
