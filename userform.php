<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script type='text/javascript'>
    window.location='signup.html';
    </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Complete Sign Up</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body background="images/signup_back.jpg" style="background-size: cover;">
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand btn btn-sm btn-dark" href="index.php"><img src="images/logo/banner.png" height="50px" width="50px" alt="" /> </a>
            <h3 style="color: white; font-family: cursive">FilesHere&reg</h3>
        </nav>
    </header>

    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Information</h4>
                </div>
                <div class="modal-body">
                    <form action="signup.php" method="POST">

                        <div class="progress" id="x">
                            <div class="progress-bar progress-bar-striped active" style="width:66%"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text"  class="form-control" required id="password" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="date">Date of Birth:</label>
                            <input type="date" class="form-control" required id="password" name="date" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" required id="password" name="password" />
                        </div>
                        <button type="submit" class="btn
                                btn-success btn-block" name="submit">
                            Complete Sign up
                        </button>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <button type="button" class="btn btn-danger float-left" onclick="window.location.href='index.php'">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>