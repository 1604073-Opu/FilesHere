<head>
    <title>FilesHere: Upload</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
if (!isset($_GET['filter'])) {
    include('dbconnect.php');
    $query = "SELECT * FROM files where status='1' or status='01' ORDER BY term";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['row'] = $row;
        include('cardview.php');
    }
} else {
    $d = $_GET['d'];
    $l = $_GET['l'];
    $t = $_GET['t'];
    include('dbconnect.php');
    $query = "SELECT * FROM files where status='1' or status='01'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        if (($d == 'all' || $d == $row['depertment']) && ($l == '-1' || $l == $row['level']) && ($t == '-1' || $t == $row['term'])) {
            $_SESSION['row'] = $row;
            include('cardview.php');
        }
    }
}
?>

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