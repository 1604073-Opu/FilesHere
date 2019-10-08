<head>
    <meta charset=" utf - 8 " />
    <meta name=" viewport " content=" width = device - width, initial - scale = 1 " />
    <link rel=" icon " href="images/logo/banner.png " type="image/x-icon">
    <link rel=" stylesheet " href="css/bootstrap.min.css " />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<html>
<?php
session_start();
include('dbconnect.php');
$user = $_SESSION['user'];
if ($_GET['type'] == 'up') {
    $sql="SELECT f.id,f.type,f.name,f.description,f.date,f.time,f.location,IFNULL(y.view,0) as view,IFNULL(y.down,0) as down
    FROM (SELECT * FROM files WHERE user='$user') as f
    LEFT JOIN (SELECT d.file as id, SUM(d.view) as view,SUM(d.down) as down FROM download d, files f  WHERE f.user='$user' and d.file=f.id GROUP BY d.file) as y 
    ON f.id=y.id";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT f.type,f.name,f.description,d.date,d.time FROM download d, files f WHERE d.user='$user' and f.id = d.file";
    $result = mysqli_query($conn, $sql);
}
?>
<div class="col-md-12" style="padding:10px">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <?php if ($_GET['type'] == 'up') { ?>
                    <th>View</th>
                    <th>Download</th>
                    <th>Link Sharing</th>
                    <th>Response</th>
                <?php } ?>
            </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <?php if ($_GET['type'] == 'up') {
                    $share_link='downloadfile.php?id='.$row['id'].'&loc='.$row['location'] ?>
                    <td align="center"><?php echo $row['view']; ?></td>
                    <td align="center"><?php echo $row['down']; ?></td>
                    <td align="left"> <button class="btn btn-outline-info"data-id="<?php echo $share_link; ?>" data-toggle="modal" data-target="#link">
                        Share
                        </button></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>&loc=<?php echo $row['location']; ?>" class="btn btn-danger"> Delete </a></td>
                <?php } ?>

            </tr>
        <?php
        }
        ?>
        <tbody>
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
<script>
    $('#link').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        var link = "http://fileshere.ourcuet.com/" + Id;
        $(e.currentTarget).find('input[name="sharelink"]').val(link);
    });

    function myFunction() {
        var copyText = document.getElementById("sharelink");
        copyText.select();
        document.execCommand("copy");
    }
</script>

</html>

