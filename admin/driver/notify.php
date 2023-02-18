<?php
include 'include/connect.php';
session_start();
$error = "";
$msg = "";

// send_mail("cool","register","ndagijimanaenock22@gmail.com");
if (isset($_POST['savebtn'])) {
    $message=mysqli_real_escape_string($con,trim($_POST['message']));
    $user_id=mysqli_real_escape_string($con,trim($_POST['user_id']));


        $insert=mysqli_query($con,"INSERT INTO `problemdriver_tbl`(`message`, `user_id`) VALUES
        ('$message','$user_id')");
        if ($insert) {

            $msg ="Your Reporting Problem is Sending Successfully ";
        }else {
            $error="There is Something Went Wrong";
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
                                    <h4 class="mb-sm-0 font-size-18">Send Notification Problem To Administrator / Manager</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">


                                        </ol>
                                    </div>


                                </div>
                                <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                                        <label for="formmessage">Message :</label>
                                                        <textarea id="formmessage" class="form-control" name="message"  placeholder="Enter Your Message"></textarea>
                                                    </div>
                                                    <button type="submit" name="savebtn" class="btn btn-warning">Send Notification</button>
                                                </div>
</div>
                        </div>
                                            </form>
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
