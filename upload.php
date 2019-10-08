<?php
session_start();
include('dbconnect.php');
if (!isset($_SESSION['user'])) {
    echo "<script type='text/javascript'>
    window.location='index.php';
    </script>";
}
$status = $_GET['type'];
$grp = $_GET['grpname'];
if (isset($_POST['submit'])) {
    if (mysqli_connect_errno($conn) == false) {
        echo "<br> <br> <br> <br>";
        $result = mysqli_query($conn, 'SELECT id FROM files ORDER BY id DESC LIMIT 1');
        $row = mysqli_fetch_array($result);
        $target_dir = "uploads/";
        $id = $row['id'] + 1;
        $loc = preg_split("/\./", $_FILES['file']['name']);
        $ext = $loc[count($loc) - 1];
        $target_file = $target_dir . $id . '.' . $ext;
        $name = $_POST['filename'];
        $des = $_POST['description'];
        $type = $_POST['category'];
        $user = $_SESSION['user'];
        $date = date("Y-m-d");
        $time = date("h:i:s");
        $status = $_GET['type'];
        $grp = $_GET['grpname'];
        if($status[0]!='0' && isset($_POST['public'])&& $_POST['public']=="on")
        {
            $status='0'.$status;
        }
        if ($status == '1' || $status == '01') {
            $level = $_POST['level'];
            $term = $_POST['term'];
            $depertment = $_POST['depertment'];
            $sql = "INSERT INTO files(user,type,location,name,description,date,time,rating,rater,status,level,term,depertment) VALUES('$user','$type','$target_file','$name','$des','$date','$time',0,0,'$status','$level','$term','$depertment')";
        } else $sql = "INSERT INTO files(user,type,location,name,description,date,time,rating,rater,status) VALUES('$user','$type','$target_file','$name','$des','$date','$time',0,0,'$status')";
        if ($status == '1' || $status == '01')
            $redirect = 'cuetians.php';
        else $redirect = 'upload.php?type=' . $status . '&grpname=' . $grp;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                    alert('File Upload is Successful!')
                    window.location='" . $redirect . "';
                  </script>";
            } else {
                echo "<script type='text/javascript'>
                alert('Failed. Try again later!')
                window.location='" . $redirect . "';
              </script>";
            }
        } else {
            echo "<script type='text/javascript'>
            alert('Failed. Try again later!')
            window.location='" . $redirect . "';
          </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<!---OPU--->

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

<body background="images/upload.jpg" style="background-size: cover;">
    <!--Navigation Bar Start-->
    <?php
    if ($status == '0')
        include('navbar.php');
    else if ($status != '0')
        include('group_navbar.php');
    ?>
    <br><br>
    <div class="modal-body">
        <div>
            <div class="modal-dialog">
                <div class="modal-content" style="background-color:rgba(200, 220, 200, 0.5); box-shadow: 10px 10px 10px 5px rgb(0,0,0,0.6);">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload File: <?php echo $grp ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="custom-file">
                                <label for="file">Select a file:</label> <br>
                                <input type="file" class="file-input" required id="file" name="file" />
                            </div>
                            <div class="form-group">
                                <label for="filename">Set a name:</label>
                                <input type="text" class="form-control" required id="filename" name="filename" style="background-color:rgba(250, 250, 250, 0.3)" />
                            </div>
                            <div class="form-group">
                                <label for="description">Add a description:</label>
                                <textarea row=4 class="form-control" id="description" name="description" style="background-color:rgba(250, 250, 250, 0.3)"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Select Category:</label>
                                <select id="category" name="category" class="custom-select" placeholder="Select Category" style="background-color:rgba(250, 250, 250, 0.3)">
                                    <option value="none" disabled selected>Select</option>
                                    <option value="audio">Audio</option>s
                                    <option value="video">Video</option>
                                    <option value="ebook">Ebook</option>
                                    <option value="compressed">Compressed files</option>
                                </select>
                            </div>
                            <?php
                            if ($status == '1' || $status == '01') { ?>
                            <div class="form-group">
                                <label for="category">Select Depertment:</label>
                                <select id="category" name="depertment" class="custom-select" placeholder="Select Category" style="background-color:rgba(250, 250, 250, 0.3)">
                                    <option value="none" disabled selected>Select</option>
                                    <option value="eee">EEE</option>
                                    <option value="cse">CSE</option>
                                    <option value="me">ME</option>
                                    <option value="ce">CE</option>
                                    <option value="ete">ETE</option>
                                    <option value="bme">BME</option>
                                    <option value="mse">MSE</option>
                                    <option value="wre">WRE</option>
                                    <option value="pme">PME</option>
                                    <option value="urp">URP</option>
                                    <option value="mie">MIE</option>
                                    <option value="arch">Arch</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Select level:</label>
                                <select id="category" name="level" class="custom-select" placeholder="Select Category" style="background-color:rgba(250, 250, 250, 0.3)">
                                    <option value="none" disabled selected>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Select term:</label>
                                <select id="category" name="term" class="custom-select" placeholder="Select Category" style="background-color:rgba(250, 250, 250, 0.3)">
                                    <option value="none" disabled selected>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <?php }
                            if ($status != '0') {
                                echo "<div class='form-group form-check'>
                                <label class='form-check-label'>
                                  <input class='form-check-input' type='checkbox' name='public' />
                                  Make public
                                </label>
                              </div>";
                            }
                            ?>
                            <button type="custom-submit" class="btn
                                        btn-success btn-block" name="submit">
                                Upload
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer d-block">
                        <button type="button" class="btn btn-danger float-left" onclick="window.location.href='home.php'">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>