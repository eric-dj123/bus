
<?php
include('layout/home.php')
?>
<?php
 include('nav.php')
?>
<!-- hero section end -->

<!-- Blog start -->
<section class="section bg-white" id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">

            </div>
        </div>
        <!-- end row -->
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Manage History</h4>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

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
                                                <th>Date Reporting</th>
                                                <th>View Message Reporting</th>

                                            </tr>
                                            </thead>


                                            <tbody>

                                            <?php
                                            $session=$_SESSION['user_id'];
                                                $select = mysqli_query($con,"SELECT  * FROM problemdriver_tbl where user_id='$session' ORDER BY `problemdriver_tbl`.`date_send` desc");
                                                $i=0;

                                                while ($row = mysqli_fetch_array($select)) {
                                                    $i++;



                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['date_send'];?></td>


                                                <td>
                                                            <div class="d-flex gap-3">
                                                            </button>
                                                            <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".orderdetailsModal<?= $row['pro_id']; ?>">View Message Sent Reporting</button>

                                                            </div>


             <div class="modal fade orderdetailsModal<?= $row['pro_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderdetailsModalLabel">Message Reporting Problem in details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="action/assigbusdriver.php" method="POST" class="custom-validation">
                            <div class="mb-12">

                                                        <label for="formmessage">Message Sent :</label>
                                                        <textarea id="formmessage" class="form-control" name="message"  placeholder="Enter Your Message" readonly>
                                                        <?php echo $row['message'];?>
                                                        </textarea>
                                                    </div>



                                    </button>

                                </div>
                                <div class="modal-footer">

                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>
                            </div>
                        </div>
                    </div> <!-- end col -->


                </div> <!-- end row -->
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- Blog end -->

<?php
include('footer.php');
                                                }
?>


