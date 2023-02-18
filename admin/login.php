<?php
session_start();
include('../layout/homes.php')

?>
<?php
include('../connect.php');
$msg="";
$error="";
if (isset($_POST['LoginBTN'])) {

    $error = "Invalid user credintials , Please try again later!!";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'or phonenumber='$email' AND status='0' AND role='admin' ") or die(mysqli_error($con));
    $selectUser = mysqli_query($connect,"SELECT * FROM users WHERE email='$email' or phonenumber='$email' AND status='0' and role='driver'");
    $selectUser1 = mysqli_query($connect,"SELECT * FROM users WHERE email='$email' or phonenumber='$email' AND status='1' and role='admin'");
    $selectUser2 = mysqli_query($connect,"SELECT * FROM users WHERE email='$email' or phonenumber='$email' AND status='1' and role='driver'");
        if (mysqli_num_rows($select) ==1) {
            $row = mysqli_fetch_array($select);
            $db_password = $row['password'];

        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];

            header("location: index.php");
        }else {
            $error = "Password does not match with any of account , Please try again later!!";
        }

        }else if (mysqli_num_rows($selectUser) ==1) {
            $row1 = mysqli_fetch_array($selectUser);
            $db_password1 = $row1['password'];

            if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password1)) {
                $_SESSION['user_id'] = $row1['user_id'];

                $_SESSION['firstname'] = $row1['firstname'];
                $_SESSION['lastname'] = $row1['lastname'];
                $_SESSION['email'] = $row1['email'];
                $_SESSION['phone'] = $row1['phone'];

                header("location:driver/index.php");
            }else {
                $error = "Password does not match with any of account , Please try again later!!";
            }
        }
        elseif(mysqli_num_rows($selectUser1) ==1){
            $error = "Your Account Is blocked Please Call Administrator";
        }
        elseif(mysqli_num_rows($selectUser2) ==1){
            $error = "Your Account Is blocked Please Call Administrator";
        }
        else {
            $error = "Invalid user credintials , Please try again later!!";
        }
}
?>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-warning ">
                                <div class="row">
                                <?php if ($msg) { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } ?>

                                        <!---Error Message--->
                                        <?php if ($error) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                    <div class="col-12">

                                        <div class="text-secondary p-4">


                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">

                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="index.php" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="../assets/images/logo.JPG" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>


                                    <a href="index.html" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="../assets/images/logo.jpg" alt="" class="rounded-circle" height="110">
                                            </span>
                                        </div>
                                    </a>
                                    <center><h4>REMS Users Login Form</h4></center><br>
                                </div>

                                <div class="p-8">

                                    <form class="form-horizontal" action="" method="POST">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email/PhoneNumber</label>
                                            <input type="text" class="form-control" id="username" name="email" placeholder="Enter Email or PhoneNumber">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button style="color:black;  font-size:16px; border-radius:30px;" class="btn btn-warning waves-effect waves-light" type="submit" name="LoginBTN">Log In</button>
                                        </div>


                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>


                                    </form>
                                </div>


                            </div>
                        </div>
                        <div class="bg-warning" style=" height: 50px; width: 452px; font-size: x-large;">
                                           .


                                        </div>


                    </div>
                </div>
            </div>
        </div>



