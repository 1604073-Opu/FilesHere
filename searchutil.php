<?php
session_start();
if (isset($_SESSION['user'])) {
  if (isset($_GET['query']) && $_GET['query'] != '') {
    $query = $_GET['query'];
    $status = strval($_GET['status']);
    $c = $_GET['category'];
    if ($c == 'all')
      $sql = "SELECT * FROM files WHERE name LIKE '%" . $query . "%' ORDER BY rating DESC";
    else    $sql = "SELECT * FROM files WHERE name LIKE '%" . $query . "%' and type='$c' ORDER BY rating DESC";
    include("dbconnect.php");
    $result = mysqli_query($conn, $sql);
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>FilesHere: Search</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="images/logo/banner.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <br /><br />
  <?php
  if (isset($result)) {
    while ($row = mysqli_fetch_array($result)) {
      if ($row['status'] == $status || $row['status'][0] == $status) {
        $_SESSION['row'] = $row;
        include('cardview.php');
      }
    }
  }
  if (isset($result) && $result->num_rows == 0) { ?>
    <div>
      <h3>No result Found...</h3>
    </div>
  <?php }
  if ($_GET['query'] == '' || $_GET['query'] == 'Search...') { ?>
    <div>
      <h3>Type Something on the search field...</h3>
    </div>
  <?php } ?>
</body>

<script>
  $("#link").on("show.bs.modal", function(e) {
    var Id = $(e.relatedTarget).data("id");
    var link = "http://fileshere.ourcuet.com/" + Id;
    $(e.currentTarget)
      .find('input[name="sharelink"]')
      .val(link);
  });

  function myFunction() {
    var copyText = document.getElementById("sharelink");
    copyText.select();
    document.execCommand("copy");
    alert("Link copied to clip board");
  }
</script>

</html>