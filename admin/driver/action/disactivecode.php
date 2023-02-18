<?php
include('../include/connect.php');
extract($_REQUEST);

$sql = "UPDATE `users` SET `status`='1' WHERE `user_id`='$user_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("Account Block");window.location.assign("../manageuser.php");</script>';

}
else{
    echo '<script>alert("Account Not Block");window.location.assign("../manageuser.php");</script>';

}
