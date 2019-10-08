<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
$user=$_SESSION['user'];
if(strlen($user)>10 && substr($user,-10)=="cuet.ac.bd"){
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: CUETians</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    $grp = 'CUETians';
    $status = '1';
    include('group_navbar.php');
    ?>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-md-9">
            <iframe src="cuetiansUtil.php" frameborder="0" width="100%" height="500px" id="iframe"></iframe>
        </div>
        <div class="col-md-3" style="border-left: solid 1px black">
            <h3>Filter</h3>
            <div class="form-group" style="margin: 10px">
                <label for="sel1">Select Depertment:</label>
                <select class="form-control" id="d" onchange="quicksearch()">
                    <option value="all" selected>All</option>
                    <?php
                    include('dbconnect.php');
                    $query = "SELECT DISTINCT(depertment) FROM files";
                    $re = mysqli_query($conn, $query);
                    while ($r = mysqli_fetch_array($re)) {
                        if ($r['depertment'] != "") {
                            ?>
                    <option class="dropdown-item" value="<?php echo strtolower($r['depertment']); ?>"><?php echo strtoupper($r['depertment']); ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group" style="margin: 10px">
                <label for="sel1">Select Level:</label>
                <select class="form-control" id="l" onchange="quicksearch()">
                    <option value="-1" selected>All</option>
                    <?php
                    $query = "SELECT DISTINCT(level) FROM files";
                    $re = mysqli_query($conn, $query);
                    while ($r = mysqli_fetch_array($re)) {
                        if ($r['level'] != 0) {
                            ?>
                    <option class="dropdown-item" value="<?php echo $r['level']; ?>"><?php echo $r['level']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group" style="margin: 10px">
                <label for="sel1">Select Term:</label>
                <select class="form-control" id="t" onchange="quicksearch()">
                    <option value="-1" selected>All</option>
                    <?php
                    $query = "SELECT DISTINCT(term) FROM files";
                    $re = mysqli_query($conn, $query);
                    while ($r = mysqli_fetch_array($re)) {
                        if ($r['term'] != 0) {
                            ?>
                    <option class="dropdown-item" value="<?php echo $r['term']; ?>"><?php echo $r['term']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</body>
<script>
    function quicksearch() {
        var d = document.getElementById('d').value;
        var l = document.getElementById('l').value;
        var t = document.getElementById('t').value;
        var s = "cuetiansUtil.php?filter=true&d=" + d + "&l=" + l + "&t=" + t;
        var frame = document.getElementById('iframe');
        frame.src=s;
    }
</script>

</html>
<?php
}
else{ 
        echo "<script type='text/javascript'>
        alert('Please login with the mail account provided by CUET');
        window.location='home.php';
        </script>";
}
?>