<?php
session_start();
if (isset($_SESSION['user'])) {
    if (isset($_GET['query']) && $_GET['query'] != '') {
        $query = $_GET['query'];
        if (!isset($_GET['status'])) $status = 0;
        else $status = $_GET['status'];
    } else {
        $query = '';
        $status = 0;
    }
    $link = 'searchutil.php?query=' . $query . '&category=all&status=' . $status;
} else {
    echo "<script type='text/javascript'>
        alert('Please Login First!');
        window.location='index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Search</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand btn btn-sm btn-dark" href="index.php"><img src="images/logo/banner.png" height="50px" width="50px" alt="" />
            </a>
            <h3 style="color: white; font-family: cursive">FilesHere</h3>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                <?php if($status=='1') echo "<a class='btn btn-dark' style='color: white; font-weight: bold; text-decoration: off;padding-top:10px' href='cuetians.php'>CUETians</a>"; ?>
                    <div class="nav-item dropdown" style="margin-right:20px">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" style="margin-right:2%" data-toggle="dropdown">
                            <img src="<?php $img = "images/user/" . $_SESSION['user'] . ".png";
                                        echo $img; ?>" onerror="this.onerror=null; this.src='images/avatar.png'" alt="User" height="28px" width="28px" style="border-radius:
                50%;">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php?logout=1">Log out</a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <br />
    <div class="row">
        <div class="col-md-4">
            <form class="form-group" style="margin: 20px">
                <label for="search" style="font-weight: bold"> Search Here...</label>
                <input type="text" id='search' class="form-control" value="<?php echo $query ?>" >
                <input type="button" class="btn btn-primary float-right" style="margin: 5px" value="Search" onclick="quicksearch()">
                <div class="form-group" style="margin: 50px">
                    <label for="sel1">Select Category:</label>
                    <select class="form-control" id="sel1" onchange="quicksearch()">
                        <option value="all" selected>All</option>
                        <option value="audio">Audio</option>
                        <option value="ebook">Ebook</option>
                        <option value="video">Video</option>
                        <option value="compressed">Compressed File</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-8" style="border-left: solid 1px black">
            <iframe src="<?php echo $link; ?>" frameborder="0" height=550px width=100% id="iframe"></iframe>
        </div>
    </div>
</body>
<script>
    function quicksearch() {
        var q = document.getElementById('search').value;
        var category = document.getElementById('sel1').value;
        var frame = document.getElementById('iframe');
        frame.src = "searchutil.php?query=" + q + "&category=" + category + "&status=" + "<?php echo $status; ?>";
    }
    var input = document.getElementById('search');
    input.addEventListener("keyup", function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        } else {
            quicksearch();
        }
    });
    input.addEventListener("keypress", function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        } else {
            quicksearch();
        }
    });
</script>

</html>