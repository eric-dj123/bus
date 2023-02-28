<?php

include('../layout/homes.php')

?>
<?php
$error="";
$msg="";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'royal_db');

  // Check if the username exists in the database
  $query = "SELECT * FROM users WHERE email='$email' OR phonenumber='$email' and status='0'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Check if the password is correct
    if (password_verify($password, $user['password'])) {
      // Set session variables
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['firstname'] = $user['firstname'];
      $_SESSION['lastname'] = $user['lastname'];


      // Redirect the user to the appropriate page
      if ($user['role'] == 'admin') {
        header("location: index.php");

        exit();
      } else {
        header("location:driver/index.php");
        exit();
      }
    } else {
      $error = 'Invalid password';
    }
  } else {
    $error = 'Invalid username';
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



