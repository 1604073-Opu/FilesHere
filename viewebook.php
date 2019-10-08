<?php
session_start();
if(isset($_SESSION['user'])){
    $id=$_GET['id'];
    $loc=$_GET['link'];
    $user=$_SESSION['user'];
    include('dbconnect.php');
    $sql="INSERT INTO download (file,user,view) VALUES('$id','$user','1') ON DUPLICATE KEY UPDATE view=view+1";
    mysqli_query($conn,$sql);
    $link=$_GET['link'];
    $link='http://docs.google.com/viewer?url=http://fileshere.ourcuet.com/'.$link.'&embedded=true';
?>
<html>
<head>
    <title>FilesHere: Read</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-color: rgb(75, 87, 87)">
    <div style="margin: 10px">
        <iframe src='<?php echo $link; ?>' width=100% height=100% style="border: none;"></iframe>
    </div>
</body>

</html>
<?php
}
else{
    echo "<script type='text/javascript'>
    alert('Please Login First!');
    window.location='index.php';
    </script>";
}
?>