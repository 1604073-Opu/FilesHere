</html>

<head>
    <title>FilesHere: Group</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
    }
    include('dbconnect.php');
    $user = $_SESSION['user'];
    $id = $_GET['group'];
    $grp = $_GET['name'];
    $status = $id;
    include('group_navbar.php');
    echo "<br><br><br><br>";
    $sql = "SELECT * FROM members WHERE id='$id' AND user='$user'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM members WHERE id='$id' AND user='$user'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $query = "SELECT * FROM files where status='$id' OR status='0" . $id . "'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['row'] = $row;
                include('cardview.php');
            }
        }
    }
    else{ ?>
        <div style="margin:10%; margin-left:30%">
            <h4>Your are not a member of this group</h4>
            <a class="btn btn-success" style="margin-left:10%"  href="grouputil.php?join=true&group=<?php echo $id?>">Send Join Request</a>
        </div>
    <?php }
    ?>
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