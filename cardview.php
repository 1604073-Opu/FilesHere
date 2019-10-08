<?php
$row = $_SESSION['row'];
$type = $row['type'];
$loc = preg_split("/\./", $row['location']);
$img = $loc[count($loc) - 1] . '.png';
$download = 'downloadfile.php?loc=' . $row['location'] . '&id=' . $row['id'];
$forum = 'forum.php?id=' . $row['id'];
if ($type == "ebook") {
  $tag = 1;
  $view = "Read";
  $viewfile = $row['location'];
  $viewfile = 'viewebook.php?id=' . $row['id'] . '&link=' . $viewfile;
} else if ($type == "audio") {
  $tag = 1;
  $view = "Stream";
  $viewfile = 'streamaudio.php?id=' . $row['id'] . '&link=' . $row['location'];
} else if ($type == "video") {
  $tag = 1;
  $view = "Stream";
  $viewfile = 'streamvideo.php?id=' . $row['id'] . '&link=' . $row['location'];
} else {
  $tag = 0;
  $view = "View";
}
$share_link = 'downloadfile.php?id=' . $row['id'] . '&loc=' . $row['location'];
?>
<div class="card" style="background-color: rgba(224, 217, 217, 0.7); margin-left: 5%; margin-right: 5%;">
  <div class="row">
    <div class="col-md-1">
      <img style="margin:15px" src="images/icon/<?php echo $img; ?>" alt="icon" height="64px" width="64px" />
    </div>
    <div class="col-md-4" style="margin: 5px">
      <h4>
        <?php echo $row['name'] ?>
        <span class="badge" style="background-color: blue; color:white; font-size: 10px">
          <?php if ($row['rater'] == 0) echo "0.0";
          else echo sprintf("%.1f", $row['rating'] / $row['rater']);
          ?>
        </span>
      </h4>
      <p style="color: blue;">
        At:
        <?php echo ($row['date'] . " " . $row['time']); ?>
        <br />
        Uploaded By:
        <?php echo preg_split("/@/", $row['user'])[0]; ?>
      </p>
    </div>
    <div class="col-md-1">
      <a href="<?php echo $forum; ?>" target="_top" class="btn btn-outline-secondary" style="margin-top: 30px; color: black">
        Forum
      </a>
    </div>
    <?php if ($tag != 0) { ?>
    <div class="col-md-1">
      <a href="<?php echo $viewfile; ?>" class="btn btn-outline-success" style="margin-top : 30px; margin-left:5px; color: black" target="_blank" >
        <?php echo $view; ?>
      </a>
    </div>
    <?php } ?>
    <div class="col-md-1">
      <a href="<?php echo $download; ?>" class="btn btn-outline-primary" style="margin-top : 30px; margin-left:20px; color: black;">
        Download
      </a>
    </div class="col-md-1">
    <button class="btn btn-outline-info" target="_top" style="margin-top: 30px; margin-left:70px; margin-bottom: 70px" data-id="<?php echo $share_link; ?>" data-toggle="modal" data-target="#link">
      Share
    </button>
  </div>
  <div class="modal fade" id="link">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Link Sharing</h5>
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div>
              <label for="sharelink">Copy this link to share</label> <br>
              <input type="text" class="form-control" id="sharelink" name="sharelink" />
              <br> <br>
            </div>
          </form>
        </div>
        <div class="modal-footer d-block">
          <button type="button" class="btn btn-success float-right" onclick="myFunction()">
            Copy Link
          </button>
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<br />