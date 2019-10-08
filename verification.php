<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script type='text/javascript'>
    window.location='signup.html';
    </script>";
}
if (isset($_POST['submit'])) {
    $code = $_SESSION['code'];
    $userCode=$_POST['code'];
    if ($code == $userCode) {
        if(isset($_GET['recovery'])){
            
       echo "<script type='text/javascript'>
       window.location='recovery.php?ok=true';
       </script>";
        }
       echo "<script type='text/javascript'>
        window.location='userform.php';
        </script>";
        die();
    } else {
        echo "<script type='text/javascript'>
        alert('Wrong verification code!');
        window.location='signup.html';
        </script>";
    }
}
$user = $_SESSION['email'];
$code = $_SESSION['code'];
?>

<!DOCTYPE html>
<html>

</html>

<head>
    <title>FilesHere: verification</title>
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
                    <h4 class="modal-title">Verify Email Account</h4>
                </div>
                <div class="modal-body">
                    <form action="verification.php" method="POST">

                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width:33%"></div>
                        </div>
                        <h4 style="color: red">An verification code was sent to
                            <?php
                            echo $user;
                            echo $code;
                            ?>
                        </h4>
                        <h6>Check your Inbox for the verification code. <br>
                            Check you spam box too if necessary.</h6>
                        <br>
                        <div class="form-group">
                            <label for="email">Enter 4 digit code:</label>
                            <input type="text" class="form-control" required id="code" name="code" />
                        </div>
                        <button type="submit" class="btn
                                btn-success btn-block" name="submit">
                            Confirm
                        </button>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <button type="button" class="btn btn-danger float-left" onclick="window.location.href='signup.html'">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>