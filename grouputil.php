<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<?php
include("dbconnect.php");
session_start();
$user = $_SESSION['user'];
if (isset($_GET['join'])) {
    $id = $_GET['group'];
    $q = "SELECT name,creator FROM groups WHERE id='$id'";
    $row = mysqli_fetch_array(mysqli_query($conn, $q));
    $date = date("Y-m-d");
    $creator = $row['creator'];
    $name = $row['name'];
    $sql = "INSERT INTO members(id,user,date,status) VALUES('$id','$user','$date','0')";
    mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>
    alert('Request Sent');
    window.location='groups.php';
    </script>";
} else if (isset($_GET['requests'])) {
    $sql = "SELECT members.id,members.user,groups.name FROM members,groups WHERE members.id=groups.id AND members.status=0 AND members.id IN (SELECT id FROM groups WHERE creator='$user')";
    $result = mysqli_query($conn, $sql);
    ?>
<br><br>
<table class='table table-striped'>
    <tr>
        <th>Group name</th>
        <th>User email</th>
        <th>Response</th>
    </tr>
    <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
    <tr>
        <td>
            <?php echo $row['name'] ?>
        </td>
        <td>
            <?php echo $row['user'] ?>
        </td>
        <td>
            <a class="btn btn-success" href="grouputil.php?accept=true&id=<?php echo $row['id'] ?>&user=<?php echo $row['user'] ?>">Accpet</a>
        
            <a class="btn btn-danger" href="grouputil.php?reject=true&id=<?php echo $row['id'] ?>&user=<?php echo $row['user'] ?>">Reject</a>
        </td>
    </tr>
    <?php }
        ?>
</table>
<?php
} else if (isset($_GET['accept'])) {
    $id = $_GET['id'];
    $uname = $_GET['user'];
    $sql = "UPDATE members SET status=1 WHERE id='$id' AND user='$uname'";
    echo $sql;
    mysqli_query($conn, $sql);
    header('location:grouputil.php?requests=true');
} else if (isset($_GET['reject'])) {
    $id = $_GET['id'];
    $uname = $_GET['user'];
    $sql = "DELETE FROM members WHERE id='$id' AND user='$uname'";
    mysqli_query($conn, $sql);
    header('location:grouputil.php?requests=true');
}
?>