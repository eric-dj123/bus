<?php
include('../include/connect.php');
extract($_REQUEST);
$hashpassword=password_hash($password, PASSWORD_BCRYPT);
$sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phonenumber`='$phonenumber',`password`='$hashpassword',`role`='$role' WHERE `user_id`='$user_id'";
$query = mysqli_query($con, $sql);

if ($query) {

    echo '<script>alert("User Update  Done");window.location.assign("../manageuser.php");</script>';

}
else{
    echo '<script>alert("Update Not Done");window.location.assign("../manageuser.php");</script>';

}
