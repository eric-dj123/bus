<?php
include('../include/connect.php');
extract($_REQUEST);
$sql = "UPDATE `problemdriver_tbl` SET `status`='1' WHERE `pro_id`='$pro_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("message wos Approved");window.location.assign("../messagesentdriver.php");</script>';

}
else{
    echo '<script>alert("update Not Done");window.location.assign("../messagesentdriver.php");</script>';

}
