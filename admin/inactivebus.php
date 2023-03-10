<?php
session_start();
$error = "";
$msg = "";
include 'include/connect.php';
error_reporting(0);
if (strlen($_SESSION['email']) == 0) {
    header('location:../admin/login.php');
}
   ?>
<?php
include 'include/connect.php';
$error = "";
$msg = "";

// send_mail("cool","register","ndagijimanaenock22@gmail.com");
if (isset($_POST['savebtn'])) {
    $platenumber=mysqli_real_escape_string($con,trim($_POST['platenumber']));
    $busname=mysqli_real_escape_string($con,trim($_POST['busname']));

    // generate verify key



    $select_chech = mysqli_query($con, "SELECT * FROM bus_tbl WHERE platenumber='".trim($_POST['platenumber'])."'");
    if (mysqli_num_rows($select_chech) > 0) {
        $error="Plate is already exists";
    }
    elseif (mysqli_num_rows($select_chech)==0) {

        $insert=mysqli_query($con,"INSERT INTO `bus_tbl`(`platenumber`, `busname`) VALUES
        ('$platenumber','$busname')");
        if ($insert) {

            $msg ="Bus is Registered Successfully";
        }else {
            $error="There is Something Went Wrong";
        }
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
                                    <h4 class="mb-sm-0 font-size-18">Bus Management</h4>

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

                                        <h4 class="card-title">Inactive Bus</h4>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add New Bus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST" class="custom-validation">

                                                            <div class="mb-2">
                                                                <label>Busname</label>
                                                                <div>
                                                                    <input type="text" name="busname" class="form-control" required data-parsley-minlength="23"
                                                                        placeholder="Enter BusName" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Plate Number</label>
                                                                <div>
                                                                    <input type="text" name="platenumber" class="form-control" required data-parsley-minlength="23"
                                                                        placeholder="Enter Platenumber" />
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
                                                <th>BusName</th>
                                                <th>Plate Number</th>

                                                <th>Create ON</th>
                                                <th>Status</th>
                                                <th>Restore</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                            <?php
                                                $select = mysqli_query($con,"SELECT  * FROM bus_tbl where status='1'");
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
                                                <td><?php echo $row['busname'];?></td>
                                                <td><?php echo $row['platenumber'];?></td>

                                                <td><?php echo $row['date_created'];?></td>
                                                <td><?php echo $status ?></td>
                                                <td>
                                                            <div class="d-flex gap-3">
                                                            </button>

                                                                <a href="" class="text-danger" data-bs-toggle="modal" data-bs-target=".orderdetailsModals<?= $row['bus_id']; ?>"><i class="mdi mdi-delete font-size-18"></i></a>

                                                            </div>


             <div class="modal fade orderdetailsModal<?= $row['bus_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Update Bus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="action/updatebuscode.php" method="POST" class="custom-validation">
                            <input type="hidden" name="bus_id" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['bus_id']; ?>" />
                                <div class="mb-2">
                                    <label>Busname</label>
                                    <div>
                                        <input type="text" name="busname" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['busname']; ?>" />
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label>Platenumber</label>
                                    <div>
                                        <input type="text" name="platenumber" class="form-control" required data-parsley-minlength="23"
                                        value="<?= $row['platenumber']; ?>" />
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
                <div class="modal fade orderdetailsModals<?= $row['bus_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Are You Sure To Restore Bus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="action/restorebus.php" method="POST" class="custom-validation">
                            <input type="hidden" name="bus_id" class="form-control" required data-parsley-minlength="23"
                                            value="<?= $row['bus_id']; ?>" />

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
