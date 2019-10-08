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
if (isset($_GET['grp'])) {
    ?>
<table class='table table-striped'>
    <tr>
        <th>Group name</th>
        <th>Group Creator</th>
    </tr>
    <?php
        $grp = $_GET['grp'];
        $sql = "SELECT * FROM groups WHERE name LIKE '%" . $grp . "%'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            ?>
    <tr>
        <td>
            <a class="btn" href="group.php?group=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" target="_top"><?php echo $row['name'] ?></a>
        </td>
        <td><?php echo $row['creator'] ?></td>
    </tr>
    <?php
        }
    }
    ?>
</table>