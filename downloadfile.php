<?php
session_start();
function Download($path,$name, $speed = null)
{
    if (is_file($path) === true) {
        $file = @fopen($path, 'rb');
        $speed = (isset($speed) === true) ? round($speed * 2048) : 524288;

        if (is_resource($file) === true) {
            set_time_limit(0);
            ignore_user_abort(false);

            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            header('Expires: 0');
            header('Pragma: public');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . sprintf('%u', filesize($path)));
            $loc = preg_split("/\./", $path);
            $ext = $loc[count($loc) - 1];
            header('Content-Disposition: attachment; filename="' .$name.'.'.$ext. '"');
            header('Content-Transfer-Encoding: binary');

            while (feof($file) !== true) {
                echo fread($file, $speed);

                while (ob_get_level() > 0) {
                    ob_end_flush();
                }

                flush();
                sleep(1);
            }

            fclose($file);
        }

        exit();
    }

    return false;
}
if (!isset($_SESSION['user']) && isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if (isset($_SESSION['user'])) {
    $id = $_GET['id'];
    $loc = $_GET['loc'];
    $user = $_SESSION['user'];
    $date = date("Y-m-d");
    $time = date("h:i:s");
    include('dbconnect.php');
    $sql = "INSERT INTO download (file,user,down,date,time) VALUES('$id','$user','1','$date','$time') ON DUPLICATE KEY UPDATE down=down+1, date='$date', time='$time'";
    mysqli_query($conn, $sql);
    $sql="SELECT name FROM files WHERE id='$id'";
    $row=mysqli_fetch_array(mysqli_query($conn,$sql));
    $name=$row['name'];
    Download($loc,$id.$name);
} else {
    echo "<script type='text/javascript'>
    alert('Please Login First!');
    window.location='index.php';
    </script>";
}
