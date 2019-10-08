<?php
session_start();
if (isset($_SESSION['user'])) {
    $id = $_GET['id'];
    $loc = $_GET['link'];
    $user = $_SESSION['user'];
    include('dbconnect.php');
    $sql = "INSERT INTO download (file,user,view) VALUES('$id','$user','1') ON DUPLICATE KEY UPDATE view=view+1";
    mysqli_query($conn, $sql);
    ?>
<html>

<head>
    <title>FilesHere: Video Streaming</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body background="images/audioback.jpg" style="background-size: cover">
    <div style="margin-top: 5%;padding-left:25%;">
        <video width="600px" controls autoplay>
            <source src="<?php echo $loc ?>" type="video/mp4">
            <source src="<?php echo $loc ?>" type="video/ogg">
            <em>Your browser does not support the video tag.</em>
        </video>
    </div>
</body>

</html>
<?php
} else {
    echo "<script type='text/javascript'>
    alert('Please Login First!');
    window.location='index.php';
    </script>";
}
?>