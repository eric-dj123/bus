

<?php
                                $error="";
                                $msg="";

include('include/connect.php');


if($_POST) {


	$currentPassword = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $newPassword = password_hash($_POST['npassword'],PASSWORD_BCRYPT);
    $conformPassword = password_hash($_POST['cpassword'],PASSWORD_BCRYPT);
	$user_id = $_POST['user_id'];

	$sql ="SELECT * FROM users WHERE user_id ='$user_id'";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['password']) {

		if($newPassword == $conformPassword) {
            $hashpassword=password_hash($currentPassword, PASSWORD_BCRYPT);

			$updateSql = "UPDATE users SET password = '$newPassword' WHERE user_id ='$user_id'";
			if($connect->query($updateSql) === TRUE) {
                $msg ="change password successfully";
			} else {

                $error ="Error while updating the password";
			}

		} else {

            $error ="New password does not match with Conform password";
		}

	} else {

            $error ="Current password is incorrect";
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
        <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
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
                            <div class="col-6">


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
                                    <h4 class="mb-sm-0 font-size-18">Change Password</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">


                                        </ol>
                                    </div>


                                </div>
                                <form class="custom-validation" action="" method="POST">

                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="text" name="passoword" class="form-control" required placeholder="Enter Current Password" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div>
                                            <input type="password" name="npassword" id="pass2" class="form-control" required
                                                placeholder="Password" />
                                        </div>
                                        <label class="form-label">Confirm Password</label>
                                        <div class="mt-3">
                                            <input type="password" name="cpassword" class="form-control" required
                                                data-parsley-equalto="#pass2" placeholder="Re-Type Password" />
                                        </div>
                                    </div>



                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-warning waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Clear
                                        </button>
                                    </div>
                                </form>
</div>
                        </div>

                        <!-- end page title -->

                        <!-- end row -->

                 <!-- end row -->

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
        <script src="assets/js/vendor/quill.min.js"></script>
<!-- quill Init js-->
<script src="assets/js/pages/demo.quilljs.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2023 11:54:02 GMT -->
</html>
