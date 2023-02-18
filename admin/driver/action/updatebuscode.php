<?php
include('../include/connect.php');
extract($_REQUEST);
$hashpassword=password_hash($password, PASSWORD_BCRYPT);
$sql = "UPDATE `bus_tbl` SET `busname`='$busname',`platenumber`='$platenumber' WHERE `bus_id`='$bus_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("Bus Update  Done");window.location.assign("../managebus.php");</script>';

}
else{
    echo '<script>alert("Bus Not Done");window.location.assign("../managebus.php");</script>';

}
