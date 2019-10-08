<?php
session_start();
if (isset($_SESSION['user'])) {
  echo "<script type='text/javascript'>
          window.location='home.php';
          </script>";
}
else if(!isset($_SESSION['user']) && isset($_COOKIE['user'])){
  $_SESSION['user']=$_COOKIE['user'];
  echo "<script type='text/javascript'>
  window.location='home.php';
  </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>FilesHere</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="images/logo/banner.png" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-color: rgb(55, 55, 56)" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!--Navigation Bar Start-->
  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand btn btn-sm btn-dark" href="#"><img src="images/logo/banner.png" height="50px" width="50px" alt="" />
      </a>
      <h3 style="color: white; font-family: cursive">FilesHere</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item">
            <a class="btn btn-dark" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="#cuetian">CUETians</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark" href="#about">About us</a>
          </li>
          <li class="nav-item">
            <button class="btn btn btn-dark" data-toggle="modal" data-target="#login">
              Log In
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <br> <br> <br>
  </header>
  <!--Navigation Bar End-->

  <!--SignUp modal Start-->
  <div class="modal fade" id="login">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Log In</h4>
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST">
            <a href="images/avatar.png" target="_blank" class="badge">
              <img src="images/avatar.png" height="20%" width="20%" alt="avatar icon" /></a>
            <br />
            <br />
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" required name="password" />
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="rememberme" />
                Remember me
              </label>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block">
              Log In
            </button>
          </form>
        </div>
        <div class="modal-footer d-block">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
            Cancel
          </button>
          <a type="button" class="btn btn-primary float-right" href="recovery.php?start=true">
            Forgot Password?
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--SignUp modal end-->

  <!--Home Start-->

  <div id="home" class="container-fluid">
    <div class="row" style="padding-top: 2%;padding-bottom: 2%">
      <div class="col-sm">
        <img src="images/homeback1.jpg" width="100%" alt="" />
        <div class="carousel-caption" style="padding-bottom: 0px;
            margin-bottom: 0px;">
          <a class="btn btn-lg btn-dark" href="signup.html">Sign
            Up</a>
          <p style="color: rgb(45, 14, 95); font-size: 2vw;">
            FilesHere: The future of sharing!
            <br />
            It is a platform for all of us, from every corner of the planet to
            share our resources, knowledge and anything. <br />
            Share with the world.
          </p>
          <h3 style="color: darkslategrey;font-size: 2.25vw">
            Welcome to
            <a href="index.php" class="badge" style="font-size: 3vw">FilesHere</a>
            !
          </h3>
        </div>
      </div>
    </div>
  </div>
  <!--Home End-->

  <!--Features Start-->
  <br>
  <div id="features" class="container-fluid border" style="padding-top:
      2%;padding-bottom: 2%">
    <div class="btn btn-block btn-outline-dark">
      <h3 style="color: white;font-size: 3.25vw">FEATURES</h3>
    </div>
    <div class="row">
      <div class="col-md-3 card" style="background-color: rgba(255, 255, 255,
          0.151); margin-left: 4%;margin-right: 4%; padding-top:5%">
        <div class="container-fluid" style="padding-left: 7%">
          <h4 style="color: rgb(151, 125, 245);font-size: 3vw">UNLIMITED DOWNLOAD</h4>
          <br>
          <p style="color: white; font-size: 1.75vw">
            No speed limitation, no quota.
            Download as much as you want!
            We provide unlimited downloading for everyone.
            <br>
            No payment needed. <br> All is free.
          </p>
        </div>
      </div>
      <div class="col-md-3 card" style="background-color: rgba(255, 255, 255,
          0.151); margin-left: 4%;margin-right: 4%;padding-top:5%">
        <div class="container-fluid" style="padding-left: 7%" >
          <h4 style="color: rgb(151, 125, 245);font-size: 3vw">UNLIMITED UPLOAD</h4>
          <br>
          <p style="color: white; font-size: 1.75vw">
            We should not be selfish! right?
            <br>
            But there is no obligation.Not yet!
            <br>
            Upload and share with the world.
          </p>
        </div>
      </div>
      <div class="col-md-3 card" style="background-color: rgba(255, 255, 255,
          0.151); margin-left: 4%;margin-right:4%;padding-top:5%">
        <div class="container-fluid" style="padding-left: 7%">
          <h4 style="color: rgb(151, 125, 245);font-size: 3vw">GROUP SHARING</h4>
          <br>
          <p style="color: white; font-size: 1.75vw">
            Create group, share within a group.
            <br>
            You can create group, add friends and acquaintances.
            Files shared in a group will only be visible within the group.
          </p>
        </div>
      </div>
      <!--
        <div class="col-md-3" style="margin-left: 0%;padding-top:5%">
            <h4 style="color: rgb(151, 125, 245)">STREAMING</h4>
            <br>
            <p style="color: white;">
              Watch videos, enjoy music, read books without downloading.
              <br>
              Click Stream and just enjoy.
            </p>
        </div>
        -->
    </div>
  </div>
  <!--Features End-->
  <br>
  <!--CUETian Start-->
  <div id="cuetian" class="container-fluid" style="padding-top:
      2%;padding-bottom: 2%">
    <div class="row">
      <div class="col-sm">
        <img src="images/homecuet1.jpg" width="100%" alt="" />
        <div class="carousel-caption">
          <div class="card" style="background-color: rgb(245, 245, 245,0.5);">
            <p style="color: rgb(25, 1, 51); font-size: 2.25vw;">
              Are you a CUETian?</p>
            <p style="color: rgb(25, 1, 51); font-size: 1.75vw;">
              <br />
              Then we have some special spearks for you!! <br>
              Share your study materials with your mates. <br>
              Download class notes, sample questions and everything you can
              think!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--CUETian End-->
  <br>
  <!--Footer Start-->
  <div class="container-fluid" style="padding-top: 2%;padding-bottom: 2%" id="about">
    <div class="card" style="background-color: rgba(196, 190, 190, 0.219);">
      <div class="row">
        <div class="col-md-2">
          <br><br>
          <img src="images/logo/logo.png" height="128px" width="128px" alt="">
        </div>
        <div class="col-md-4">
          <div>
            <br><br>
            <h3 class="font-weight-bold" style="color: white">About Us</h3>
            <p style="color: white">
              FilesHere <br>
              &copy Md. Nahidul islam Opu <br>
              &nbsp Chittagong University of Engineering and Technology,<br>
              &nbsp Chittagong, Bangladesh.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div>
            <br><br>
            <h3 class="font-weight-bold" style="color: white">Contact Us</h3>
            <p style="color: white">
              +8801986980335 <br>
              opu.nahidul@gmail.com
            </p>
          </div>
          <div class="col-md-2">
            
          </div>
        </div>
      </div>
      <div>
        <p></p>
      </div>
    </div>
  </div>
  <!--Footer End-->
</body>

</html>