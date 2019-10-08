<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    alert('Please Login First!');
    window.location='index.php';
    </script>";
}
$img="images/user/".$_SESSION['user'].".png";
?>
<!DOCTYPE html>
<html>

<head>
    <title>FilesHere: Profile</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand btn btn-sm btn-dark" href="index.php"><img src="images/logo/banner.png" height="50px" width="50px" alt="" /> </a>
            <h3 style="color: white; font-family: cursive">FilesHere</h3>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" style="margin-right:2%" data-toggle="dropdown">
                            
                <img src="<?php $img="images/user/".$_SESSION['user'].".png"; echo $img; ?>" onerror="this.onerror=null; this.src='images/avatar.png'" alt="User" height="28px" width="28px" style="border-radius: 50%;" >
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
              <div style="margin: 20px; border-style: solid; border-width: 0.5px">
                <div class="d-flex flex-column" style="padding: 25px" >
                    <h5 class="btn btn-outline-dark disabled"  style="color: black;"><?php echo $_SESSION['user']; ?></h5>
                    <img src="<?php echo $img; ?>" onerror="this.onerror=null; this.src='images/avatar.png'" height="128px" style="padding-left:10px; padding-right:10px; border-radius: 50%;" >
                    <br> <br>
                    <button class="btn btn-outline-info" data-toggle="modal" data-target="#photo">
                            Edit
                          </button>
                </div>
              </div> 
                <div class="container-fluid" style="padding: 20px">
                  <button class="btn btn-block btn-outline-info"  onclick="setURL('viewprofile.php')" style="border-color: darkcyan; color:black; padding: 7px" id='profile'>
                    <h5 style="text-align: left">Profile</h5>
                  </button>
                  <button class="btn btn-block btn-outline-info" onclick="setURL('editprofile.php')" style="border-color: darkcyan; color:black; padding: 7p x" id="editprofile">
                    <h5 style="text-align: left">Edit Profile</h5>
                  </button>
                  <button class="btn btn-block btn-outline-info" onclick="setURL('changepass.php')" style="border-color: darkcyan; color:black; padding: 7px" id="change">
                    <h5 style="text-align: left">Change Password</h5>
                  </button>
                  <button class="btn btn-block btn-outline-info" onclick="setURL('grouputil.php?requests=true')" style="border-color: darkcyan; color:black; padding: 7px" id="change">
                    <h5 style="text-align: left">Groups</h5>
                  </button>
                  <button class="btn btn-block btn-outline-info" onclick="setURL('history.php?type=up')" style="border-color: darkcyan; color:black; padding: 7px" id="uhis">
                      <h5 style="text-align: left">Upload History</h5>
                  </button>
                  <button class="btn btn-block btn-outline-info" onclick="setURL('history.php?type=down')" style="border-color: darkcyan; color:black; padding: 7px" id="dhis">
                    <h5 style="text-align: left">Download History</h5>
                </button>
                </div>
            </div>

            <div class="col-md-9">
              <div>
                <iframe src="viewprofile.php" frameborder="0" height=550px width=100% id="iframe"></iframe>
              </div>
            </div>
        </div>

    </div>
    <!--upload profile photo with modal-->
    <div class="modal fade" id="photo">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Upload Photo</h4>
                  <button type="button" class="close" data-dismiss="modal">
                    &times;
                  </button>
                </div>
                <div class="modal-body">
                  <form action="uploadpp.php" method="POST" enctype="multipart/form-data">
                    <div class="custom-file">
                      <label for="file">Select a photo:</label> <br> 
                      <input type="file" class="file-input" required id="file" name="file" />
                      <br> <br>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">
                      Upload
                    </button>
                  </form>
                </div>
                <div class="modal-footer d-block">
                  <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                    Cancel
                  </button>
          </div>
        </div>
      </div>
    </div>
  <script>
    function setURL(url){
      document.getElementById('iframe').src = url;
   }
  </script>        
</body>

</html>