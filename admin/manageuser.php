<?php
include 'include/connect.php';
$error = "";
$msg = "";

// send_mail("cool","register","ndagijimanaenock22@gmail.com");
if (isset($_POST['savebtn'])) {
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $phonenumber=mysqli_real_escape_string($con,trim($_POST['phonenumber']));
    $email =mysqli_real_escape_string($con,trim($_POST['email']));
    $role =mysqli_real_escape_string($con,trim($_POST['role']));
    $password =$_POST['password'];
    $cpass =$_POST['password'];
    // generate verify key



    $select_chech = mysqli_query($con, "SELECT * FROM users WHERE email='".trim($_POST['email'])."' OR phonenumber='".trim($_POST['phonenumber'])."'");
    if (mysqli_num_rows($select_chech) > 0) {
        $error="email or Phone Already used!";
    }elseif ($password != $cpass) {
        $error ="Password are not Match";
    }
    elseif (mysqli_num_rows($select_chech)==0) {
        $hashpassword=password_hash($password, PASSWORD_BCRYPT);


        $insert=mysqli_query($con,"INSERT INTO `users`(`firstname`, `lastname`, `phonenumber`, `email`, `password`,`role`) VALUES
        ('$firstname','$lastname','$phonenumber','$email','$hashpassword','$role')");
        if ($insert) {

            $msg ="New User is Added success";
        }else {
            $error="There is Something Went Wrong";
        }
    }else {
        $error="email or Phone  Already used!";
    }
}
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2023 11:52:58 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Royal Express</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="" data-layout-mode="light">


    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


           <?php
           include('include/header.php');
           ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php
           include('include/navbar.php');
           ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">


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


                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Users List Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">


                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Users Management</h4>
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light mb-2 me-2"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="mdi mdi-plus me-1"></i> Add New User</button>
                                        </div>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Users</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST" class="custom-validation">

                                                            <div class="mb-2">
                                                                <label>FirstName</label>
                                                                <div>
                                                                    <input type="text" name="firstname" class="form-control" required data-parsley-minlength="23"
                                                                        placeholder="Enter Firstname" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>LastName</label>
                                                                <div>
                                                                    <input type="text" name="lastname" class="form-control" required data-parsley-minlength="23"
                                                                        placeholder="Enter LastName" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Email</label>
                                                                <div>
                                                                    <input type="email" class="form-control"  name="email" required data-parsley-minlength="23"
                                                                        placeholder="Enter Email Address" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>PhoneNumber</label>
                                                                <div>
                                                                    <input type="phonenumber" class="form-control" name="phonenumber"required data-parsley-minlength="23"
                                                                        placeholder="Enter PhoneNumber" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-2">
                                                                <label>Role</label>
                                                                <select class="form-select" id="validationCustom03"  name="role"required>
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option>Admin</option>
                                                                    <option>Driver</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Password</label>
                                                                <div>
                                                                    <input type="password" class="form-control" name="password" required data-parsley-minlength="23"
                                                                        placeholder="Enter Password" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Confirm Password</label>
                                                                <div>
                                                                    <input type="password" class="form-control" name="password" required data-parsley-minlength="23"
                                                                        placeholder="Re-Type Password" />
                                                                </div>
                                                            </div>


                                                            <div class="d-flex flex-wrap gap-2">
                                                                <button type="submit" name="savebtn" class="btn btn-warning waves-effect waves-light">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr><th>#</th>
                                                <th>FirstName</th>
                                                <th>LastName</th>
                                        
                                                <th>PhoneNumber</th>
                                                <th>Role</th>
                                                <th>Create ON</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                            <?php
                                                $select = mysqli_query($con,"SELECT  * FROM users");
                                                $i=0;

                                                while ($row = mysqli_fetch_array($select)) {
                                                    $i++;

if($row['status']==0){
    $status='<span class="badge bg-success">Active</span>';
  }
  elseif($row['status']==1){
      $status='<span class="badge bg-danger">Inactive</span>';
  }

                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['firstname'];?></td>
                                                <td><?php echo $row['lastname'];?></td>

                                                <td><?php echo $row['phonenumber'];?></td>
                                                <td><?php echo $row['role'];?></td>
                                                <td><?php echo $row['created_on'];?></td>
                                                <td><?php echo $status ?></td>
                                                <td>
                                                            <div class="d-flex gap-3">
                                                            </button>
                                                                <a href="" class="text-success"  data-bs-toggle="modal" data-bs-target=".orderdetailsModal<?= $row['user_id']; ?>"><i class="mdi mdi-pencil font-size-18" ></i></a>
                                                                <a href="" class="text-danger" data-bs-toggle="modal" data-bs-target=".orderdetailsModals<?= $row['user_id']; ?>"><i class="mdi mdi-delete font-size-18"></i></a>

                                                            </div>


             <div class="modal fade orderdetailsModal<?= $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Update Users</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="action/updateusercode.php" method="POST" class="custom-validation">
                            <input type="hidden" name="user_id" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['user_id']; ?>" />
                                <div class="mb-2">
                                    <label>FirstName</label>
                                    <div>
                                        <input type="text" name="firstname" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['firstname']; ?>" />
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label>LastName</label>
                                    <div>
                                        <input type="text" name="lastname" class="form-control" required data-parsley-minlength="23"
                                        value="<?= $row['lastname']; ?>" />
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label>Email</label>
                                    <div>
                                        <input type="email" class="form-control"  name="email" required data-parsley-minlength="23"
                                            placeholder="Enter Email Address"  value="<?= $row['email']; ?>" />
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label>PhoneNumber</label>
                                    <div>
                                        <input type="phonenumber" class="form-control" name="phonenumber"required data-parsley-minlength="23"
                                            placeholder="Enter PhoneNumber"  value="<?= $row['phonenumber']; ?>" />
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label>Role</label>
                                    <select class="form-select" id="validationCustom03"  name="role"required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="admin">Admin</option>
                                        <option value="driver">Driver</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label>Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="password" required data-parsley-minlength="23"
                                            placeholder="Enter Password"  value="<?= $row['password']; ?>" />
                                    </div>
                                </div>



                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" name="savebtn" class="btn btn-warning waves-effect waves-light">
                                        Submit
                                    </button>

                                </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end modal -->
                <div class="modal fade orderdetailsModals<?= $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Are You Sure To Disable Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="action/disactivecode.php" method="POST" class="custom-validation">
                            <input type="hidden" name="user_id" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['user_id']; ?>" />

                             <center>
                                    <button type="submit" name="savebtn" class="btn btn-warning waves-effect waves-light">
                                        Yes
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                </center>



                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                                                        </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


               <?php
               include('include/footer.php');
               ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->


        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2023 11:54:02 GMT -->
</html>
