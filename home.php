<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
include("dbconnect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Home</title>
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
    <!--Navigation Bar Start-->
    <?php
    include('navbar.php')
    ?>
    <br><br><br>
    <!--Navigation Bar End-->
    <!--Home Start-->
    <div class="panel panel-default">
        <div class="panel-heading card" style="margin: 20px;padding: 10px">
            <a data-toggle="collapse" href="#latest" style="text-decoration: none">
                <h4>TOP TEN Latest Uploads</h4>
            </a>
        </div>
        <div id="latest" class="panel-collapse collapse show">
            <div class="row" style="margin: 15px; ">
                <?php
                $sql = "SELECT * FROM files ORDER BY date DESC LIMIT 10";
                $result = mysqli_query($conn, $sql);
                while ($latest10 = mysqli_fetch_array($result)) {
                    if ($latest10['status'] == '0' || $latest10['status'][0] == '0') {
                        $id = $latest10['id'];
                        $name = $latest10['name'];
                        $loc = preg_split("/\./", $latest10['location']);
                        $img = $loc[count($loc) - 1] . '.png';
                        ?>
                        <div class="col-md-2 card" style="margin: 20px" onmouseover="this.style.backgroundColor='rgba(155, 159, 216, 0.486)'" onmouseout="this.style.backgroundColor='white'">
                            <a href="forum.php?id=<?php echo $id ?>" style="text-decoration: none;">
                                <div class="row" style="padding:10px">
                                    <div class="col-md-8">
                                        <h6 style="color: black;font-weight: bold"><?php echo $name ?></h6>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="images/icon/<?php echo $img ?>" alt="<?php echo $img ?>" height="64px">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading card" style="margin: 20px;padding: 10px">
            <a data-toggle="collapse" href="#down" style="text-decoration: none">
                <h4>TOP TEN Most Downloaded</h4>
            </a>
        </div>
        <div id="down" class="panel-collapse collapse show">
            <div class="row" style="margin: 15px;">
                <?php
                $sql = "SELECT files.id,files.name,files.location,d.down,files.status FROM (SELECT file AS id, IFNULL(SUM(down),0) AS down FROM download GROUP BY file) d, files WHERE files.id=d.id ORDER BY d.down DESC LIMIT 10";
                $result = mysqli_query($conn, $sql);
                while ($latest10 = mysqli_fetch_array($result)) {
                    if ($latest10['status'] == '0' || $latest10['status'][0] == '0') {
                        $id = $latest10['id'];
                        $name = $latest10['name'];
                        $loc = preg_split("/\./", $latest10['location']);
                        $img = $loc[count($loc) - 1] . '.png';
                        ?>
                        <div class="col-md-2 card" style="margin: 20px" onmouseover="this.style.backgroundColor='rgba(155, 159, 216, 0.486)'" onmouseout="this.style.backgroundColor='white'">
                            <a href="forum.php?id=<?php echo $id ?>" style="text-decoration: none;">
                                <div class="row" style="padding:10px">
                                    <div class="col-md-8">
                                        <h6 style="color: black;font-weight: bold"><?php echo $name ?></h6>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="images/icon/<?php echo $img ?>" alt="<?php echo $img ?>" height="64px">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading card" style="margin: 20px;padding: 10px">
            <a data-toggle="collapse" href="#view" style="text-decoration: none">
                <h4>TOP TEN Most Viewed</h4>
            </a>
        </div>
        <div id="view" class="panel-collapse collapse show">
            <div class="row" style="margin: 15px">
                <?php
                $sql = "SELECT files.id,files.name,files.location,d.down,files.status FROM (SELECT file AS id, IFNULL(SUM(view),0) AS down FROM download GROUP BY file) d, files WHERE files.id=d.id ORDER BY d.down DESC LIMIT 10";
                $result = mysqli_query($conn, $sql);
                while ($latest10 = mysqli_fetch_array($result)) {
                    if ($latest10['status'] == '0' || $latest10['status'][0] == '0') {
                        $id = $latest10['id'];
                        $name = $latest10['name'];
                        $loc = preg_split("/\./", $latest10['location']);
                        $img = $loc[count($loc) - 1] . '.png';
                        ?>
                        <div class="col-md-2 card" style="margin: 20px" onmouseover="this.style.backgroundColor='rgba(155, 159, 216, 0.486)'" onmouseout="this.style.backgroundColor='white'">
                            <a href="forum.php?id=<?php echo $id ?>" style="text-decoration: none;">
                                <div class="row" style="padding:10px">
                                    <div class="col-md-8">
                                        <h6 style="color: black;font-weight: bold"><?php echo $name ?></h6>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="images/icon/<?php echo $img ?>" alt="<?php echo $img ?>" height="64px">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!--Home End-->
</body>

</html>