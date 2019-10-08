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
    <title>FilesHere: Audio Streaming</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body background="images/audioback.jpg" style="background-size: cover">
    <div style="margin-top: 40%;padding-left:40%; background-color: rgb(189, 207, 207,.4)">
        <audio class="audio" controls autoplay loop>
            <source src="<?php echo $loc ?>" type="audio/mpeg" />
            <source src="<?php echo $loc ?>" type="audio/ogg" />
            <source src="<?php echo $loc ?>" type="audio/wav" />
            <em>Sorry, your browser doesn't support HTML5 audio.</em>
        </audio>
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