<?php
include('../include/connect.php');
extract($_REQUEST);

$sql = "UPDATE `users` SET `status`='0' WHERE `user_id`='$user_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("Account Restored");window.location.assign("../manageuser.php");</script>';

}
else{
    echo '<script>alert("Account Not Restored");window.location.assign("../manageuser.php");</script>';

}
