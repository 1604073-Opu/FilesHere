<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <img src="images/logo/banner.png" height="32px" width="32px" alt="" />
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="btn btn-dark" href="home.php">Home</a>
                </li>
                <?php if($status!=-1){ ?>
                    
                <li class="nav-item">
                    <a class="btn btn-dark" href="upload.php?type=<?php echo $status ?>&grpname=<?php echo $grp ?>">Upload Files</a>
                </li>
                <li class="nav-item-inline" style="margin:5px">
                    <form action="search.php" class="form-inline">
                        <input type="text" name='status' value="<?php echo $status ?>" hidden>
                        <input type="text" class="form-control" placeholder="Quick Search.." name="query">
                        <button type="submit" class="form-control" style="margin-left:5px "><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div>
            <a style="color: white; font-weight: bold; text-decoration: off">
                <?php echo $grp; ?>
            </a>
        </div>
        <div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <img src="<?php $img = "images/user/" . $_SESSION['user'] . ".png";
                                echo $img; ?>" onerror="this.onerror=null; this.src='images/avatar.png'" alt="User" height="28px" width="28px" style="border-radius: 50%;">
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php?logout=1">Log out</a>
                </div>
            </div>
        </div>
    </nav>
</header>