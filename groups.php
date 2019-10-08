<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
        window.location='index.php';
        </script>";
}
$user = $_SESSION['user'];
include("dbconnect.php");
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO groups(name,creator,date) VALUES(\"$name\",'$user','$date')";
    mysqli_query($conn, $sql);
    echo $sql;
    $query = "SELECT LAST_INSERT_ID() as id";
    $row = mysqli_fetch_array(mysqli_query($conn, $query));
    $id = $row['id'];
    $sql = "INSERT INTO members VALUES('$id','$user','$date','1')";
    echo $sql;
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Groups</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        div.scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: #777;
        }
    </style>
</head>

<body>
    <?php
    $grp = 'Groups';
    $status = -1;
    include('group_navbar.php');
    ?>
    <br /><br /><br />
    <div class="row">
        <div class="col-md-9">
            <div class="d-inline">
                <h3 class="d-inline" style="margin: 5px">Your Groups:</h3>
                <div class="scrollmenu" style="border-bottom: solid 1px black;border-width:100%">
                    <?php
                    include('dbconnect.php');
                    $sql = "SELECT groups.name,groups.id,user FROM members,groups WHERE groups.id=members.id AND members.user='$user' AND members.status=1";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                    <a class="btn btn-outline-dark" href="group.php?group=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" style="margin:5px ;text-decoration: off;color: black"><?php echo $row['name'] ?></a>
                    <?php }
                    if ($result->num_rows == 0) echo "No groups to show";
                    ?>
                </div>
            </div>
            <br>
            <div class="container">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  data-toggle="tab" href="#menu1">Search a group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#create">Create a group</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="create" class="container tab-pane fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Group</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="groups.php" method="POST">
                                        <div class="custom-control">
                                            <label for="file">Enter a group name:</label> <br />
                                            <input type="text" class="form-control" required id="file" name="name" />
                                            <br />
                                            <br />
                                        </div>
                                        <input type="submit" name="create" class="btn btn-success btn-block" value="CREATE">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="container tab-pane active"><br>
                        <div class="nav-item-inline" style="margin-left:30%">
                            <form class="form-inline" action="#">
                                <input type="text" class="form-control" placeholder="Search a group.." id="grp" onkeyup="searchgroup()">
                                <button type="submit" class="form-control" style="margin-left:5px " onclick="searchgroup()"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <iframe src="groupsearch.php" frameborder="0" height="100%" width="100%" id="iframe"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="border-left: solid 1px black; height: 100%">
            <div>
                <h3 style="padding-left: 20%;">More Groups</h3>
                <div class="pre-scrollable" style="padding-left: 25%;">
                    <?php
                    include('dbconnect.php');
                    $sql = "SELECT name,id FROM groups WHERE id NOT IN (SELECT id FROM members WHERE user='$user')";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                    <a class="btn" href="group.php?group=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" style="margin:10px;text-decoration: off"><?php echo $row['name'] ?></a>
                    <br>
                    <?php }
                    if ($result->num_rows == 0) echo "No groups to show";
                    ?>
                </div>
            </div>
        </div>
    </div>
<script>
    function searchgroup() {
        var q = document.getElementById('grp').value;
        var frame = document.getElementById('iframe');
        frame.src = "groupsearch.php?grp="+q;
    }
</script>
</body>

</html>