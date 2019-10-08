<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
include('dbconnect.php');
if (mysqli_connect_errno($conn) == false) {
    $type = $_GET['type'];
    $_SESSION['type'] = $type;
    $sql = "SELECT * FROM files WHERE type='$type'";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Browse</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body background="images/browse.jpg" style="background-size: cover;">
    <!--Navigation Bar Start-->
    <?php
    include('navbar.php');
    ?>
    <br>
    <br><br><br>

    <div class="container-fluid">
        <?php
        while ($row = mysqli_fetch_array($result)) {
            if($row['status']=='0' || $row['status'][0]=='0'){
                $_SESSION['row'] = $row;
                include("cardview.php");
            }
        }
        ?>
    </div>
</body>
<script>
    $('#link').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        var link = "http://fileshere.ourcuet.com/" + Id;
        $(e.currentTarget).find('input[name="sharelink"]').val(link);
    });

    function myFunction() {
        var copyText = document.getElementById("sharelink");
        copyText.select();
        document.execCommand("copy");
        alert("Link copied to clip board");
    }
</script>

</html>