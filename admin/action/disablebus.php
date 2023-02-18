<?php
include('../include/connect.php');
extract($_REQUEST);

$sql = "UPDATE `bus_tbl` SET `status`='1' WHERE `bus_id`='$bus_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("Bus Disactive  Done");window.location.assign("../managebus.php");</script>';

}
else{
    echo '<script>alert("Bus Not Disactive Done");window.location.assign("../managebus.php");</script>';

}
