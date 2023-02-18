<?php
include('../include/connect.php');
extract($_REQUEST);
$status1='YES';
$status='YES';
$sql = mysqli_query($con, "INSERT INTO `assigned_driver` (`bus_id`,`user_id`) VALUES ('$bus_id','$user_id')");
if ($sql) {
    mysqli_query($con, "UPDATE `users` SET `status1`='$status1' WHERE `user_id`='$user_id'");
    mysqli_query($con, "UPDATE `bus_tbl` SET `assignstatus`='$status' WHERE `bus_id`='$bus_id'");

    echo '<script>alert("Assign Bus to Driver Is Successfully");window.location.assign("../managedriver.php");</script>';

}
else{
    echo '<script>alert("Not Done");window.location.assign("../managedriver.php");</script>';

}
