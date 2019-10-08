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
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="browse" data-toggle="dropdown" style="color: white">Browse Files
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        $query = "SELECT DISTINCT(type) FROM files";
                        $re = mysqli_query($conn, $query);
                        while ($r = mysqli_fetch_array($re)) {
                            ?>
                            <a class="dropdown-item" href="browse.php?type=<?php echo $r['type']; ?>"><?php echo ucwords($r['type']); ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <li class="nav-item">
                    <a class="btn btn-dark" href="upload.php?type=0&grpname=Public">Upload Files</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="cuetians.php">CUETians</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="groups.php">Groups</a>
                </li>
                <li class="nav-item-inline" style="margin:5px">
                    <form action="search.php" class="form-inline">
                        <input type="text" class="form-control" placeholder="Quick Search.." name="query">
                        <button type="submit" class="form-control" style="margin-left:5px "><i class="fa fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
        <div style="margin-top:0.8%">
            <a style="color: white" href="profile.php">
                <?php $name = preg_split("/@/", $_SESSION['user']);
                echo $name[0]; ?>
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