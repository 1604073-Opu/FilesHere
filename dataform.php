<?php
$name="opu";
if (!file_exists($name)) {
    mkdir($name , 0777, true);
}
$target_file = "data/" . $_FILES['file']['name'] ;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "Uploaded!";
} else {
    echo "Failed! ";
}