<!DOCTYPE html>
<html>

<head>
    <title>FilesHere:Recovery</title>
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
            <h3 style="color: white; font-family: cursive">FilesHere</h3>
        </nav>
    </header>
    <?php if (isset($_GET['start'])) { ?>
    <div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Password Recovery</h4>
                </div>
                <div class="modal-body">
                    <form action="sendmail.php" method="POST">

                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width:1%"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Your Email address:</label>
                            <input type="email" class="form-control" required placeholder="example@email.com" id="email" name="email" />
                        </div>
                        <button type="submit" class="btn
                                btn-success btn-block" name="recover">
                            Verify
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
    <?php }
    ?>
</body>

</html>