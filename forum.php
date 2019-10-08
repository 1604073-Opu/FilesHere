<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
$user = $_SESSION['user'];
include('dbconnect.php');
$_SESSION['currentitem'] = $_GET['id'];
$id = $_GET['id'];
$_SESSION['comid'] = $id;
$sql = "SELECT * FROM files WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$download = 'downloadfile.php?loc=' . $row['location'] . '&id=' . $row['id'];
$tag = 1;
if ($row['type'] == "ebook") {
    $view = "Read";
    $viewfile = $row['location'];
    $viewfile = 'viewebook.php?id=' . $row['id'] . '&link=' . $viewfile;
} else if ($row['type']  == "audio") {
    $view = "Stream";
    $viewfile = 'streamaudio.php?id=' . $row['id'] . '&link=' . $row['location'];
} else if ($row['type']  == "video") {
    $view = "Stream";
    $viewfile = 'streamvideo.php?id=' . $row['id'] . '&link=' . $row['location'];
} else {
    $tag = 0;
    $view = "View";
}
$sql = "SELECT rate from download WHERE file=$id and user='$user'";
$res = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($res);
$rating = $result['rate'];
$user = preg_split("/@/", $row['user'])[0];
$imgg = "images/user/" . $row['user'] . ".png";
$loc = preg_split("/\./", $row['location']);
$fileicon = $loc[count($loc) - 1] . '.png';
$share_link = 'downloadfile.php?id=' . $id . '&loc=' . $row['location'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Forum</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>

<body>
    <!--Navigation Bar Start-->
    <?php
    include('navbar.php')
    ?>
    <br> <br> <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" style="margin-left: 50px; margin-top:50px">
                <h2 style="font-weight: bold"><?php echo $row['name'] ?>
                    <span class="badge" style="background-color: blue; color:white; font-size: 10px">
                        <?php if ($row['rater'] == 0) echo "0.0";
                        else echo sprintf("%.1f", $row['rating'] / $row['rater']);
                        ?>
                    </span>
                </h2>
                <div class="row">
                    <div class="col-md-6" style="margin: 20px; margin-bottom:50px">
                        <p><?php echo $row['description']; ?></p>
                        <?php $stat = $row['status'];
                        $u=$_SESSION['user'];
                        if ($stat == "1"&&strlen($u)>10 && substr($u,-10)=="cuet.ac.bd") {
                            echo "<p>Depertment of " . strtoupper($row['depertment']) . "</p>";
                            echo "<p>Level : " . strtoupper($row['level']) . "</p>";
                            echo "<p>Term : " . strtoupper($row['term']) . "</p>";
                        }
                        else if($stat == "1"&&strlen($u)>10 && substr($u,-10)!="cuet.ac.bd"){
                            echo "<script type='text/javascript'>
                            alert('Please login with the mail account provided by CUET');
                            window.location='home.php';
                            </script>";
                        }
                        ?>
                    </div>
                    <div class="col-md-3">
                        <img style="margin:15px" src="images/icon/<?php echo $fileicon; ?>" alt="icon" height="128px" width="128px" />
                    </div>
                </div>
                <p>Show your appreciation by rating it:</p>
                <?php
                $i = 1;
                while ($i <= 5) {
                    if ($i <= $rating) {
                        ?>
                <span class="fa fa-star checked" id='<?php echo $i; ?>' onclick="add(this,'<?php echo $i; ?>')"></span>
                <?php } else { ?>
                <span class="fa fa-star" id='<?php echo $i; ?>' onclick="add(this,'<?php echo $i; ?>')"></span>
                <?php }
                    $i = $i + 1;
                } ?>
                <br><br>
                <div class="row" style="color: tomato">
                    <div class="col-md-3">
                        <p>Upload date: <?php echo $row['date'] ?></p>
                    </div>
                    <div class="col-md-3">
                        <p>Upload time: <?php echo $row['time'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <?php if ($tag != 0) { ?>
                    <div class="col-md-1">
                        <a href="<?php echo $viewfile; ?>" class="btn btn-outline-success" style="margin-top : 30px; margin-left:5px; color: black" target="_blank" >
                            <?php echo $view; ?>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="col-md-1">
                        <a href="<?php echo $download; ?>" class="btn btn-outline-primary" style="margin-top : 30px; margin-left: 10px; color: black;">
                            Download
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-outline-info" style="margin-top: 30px; margin-left:40px; margin-bottom: 70px" data-id="<?php echo $share_link; ?>" data-toggle="modal" data-target="#link">
                            Share
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-outline-danger" style="margin-top: 30px; margin-left:45px; margin-bottom: 70px" data-id="">
                            Report
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div style="margin: 50px; border-style: solid; border-width: 0.5px">
                    <div class="d-flex flex-column" style="padding: 25px">
                        <h4>Uploaded By</h4>
                        <img src="<?php echo $imgg; ?>" onerror="this.onerror=null; this.src='images/avatar.png'" height="128px" style="border-radius: 50%;">
                        <br><br> <br>
                        <h5 class="btn btn-outline-dark disabled" style="color: black; "><?php echo $user; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="link">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Link Sharing</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <label for="sharelink">Copy this link to share</label> <br>
                            <input type="text" class="form-control" id="sharelink" name="sharelink" />
                            <br> <br>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <button type="button" class="btn btn-success float-right" onclick="myFunction()">
                        Copy Link
                    </button>
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6" style="margin-left: 100px">
        <form action="savecomment.php" method="POST">
            <div class="form-group">
                <label for="comment" style="font-weight: bold">Write Something:</label>
                <textarea class="form-control" rows="4" id="comment" name="comment" placeholder="Write your comment here..."></textarea>
            </div>
            <button type="submit" class="btn btn-success float-right">Post</button>
        </form>
    </div>

    <div class="col-md-6" style="margin: 100px">
        <?php
        $sql = "SELECT * FROM comments WHERE file=$id";
        $res = mysqli_query($conn, $sql);
        if ($res->num_rows > 0) { ?>
        <h5 style="font-weight: bold">Comments from other users:</h5> <br>
        <?php }
        while ($comm = mysqli_fetch_array($res)) {
            $im = "images/user/" . $comm['user'] . ".png"; ?>
        <div class="media" style="padding: 10px">
            <div class="media-left media-top">
                <img src="<?php echo $im; ?>" class="media-object" onerror="this.onerror=null; this.src='images/avatar.png'" width="60px">
            </div>
            <div class="media-body">
                <h4 class="media-heading" style="font-weight: 600"><?php echo preg_split("/@/", $comm['user'])[0] ?></h4>
                <p style="padding-left: 20px"><?php echo $comm['com'] ?></p>
            </div>
        </div>
        <?php } ?>
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

    function add(ths, sno) {
        for (var i = 1; i <= 5; i++) {
            var cur = document.getElementById(i)
            cur.className = "fa fa-star";
        }

        for (var i = 1; i <= sno; i++) {
            var cur = document.getElementById(i)
            if (cur.className == "fa fa-star") {
                cur.className = "fa fa-star checked";
            }
        }
        window.location.href = "rate.php?rating=" + sno
    }
</script>

</html>