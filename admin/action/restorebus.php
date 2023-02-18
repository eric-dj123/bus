<?php
include('../include/connect.php');
extract($_REQUEST);

$sql = "UPDATE `bus_tbl` SET `status`='0' WHERE `bus_id`='$bus_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("Bus Restored  Done");window.location.assign("../managebus.php");</script>';

}
else{
    echo '<script>alert("Bus Not  Restored ");window.location.assign("../managebus.php");</script>';

}
