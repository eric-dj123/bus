
        <?php
        include('layout/home.php');
        include 'connect.php';
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
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h1 class="card-title">Welcome To Royal Express Management Information System</h1>
                                        <p class="card-title-desc">a large motor vehicle, having a long body, equipped with seats or benches for passengers, usually operating as part of a scheduled service</p>

                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="assets/images/small/royal4.jpg" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="assets/images/small/royal4.jpg" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="assets/images/small/royal2.jpg" alt="Third slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr><th>#</th>
                                                <th>FirstName</th>
                                                <th>LastName</th>
                                                <th>Driver Mobile No</th>
                                                <th>Destination</th>
                                                <th>Date </th>
                                                <th>Time</th>



                                            </tr>
                                            </thead>


                                            <tbody>
                                            <?php
                                            $cdate= date('Y-m-d');
                                                $select = mysqli_query($con,"SELECT  users.firstname,users.lastname,users.lastname,users.user_id,users.phonenumber,notify_tbl.destination,bus_tbl.bus_id,notify_tbl.dipaturetime,bus_tbl.platenumber,notify_tbl.comment,notify_tbl.dipaturetime,notify_tbl.date_notified FROM notify_tbl JOIN users ON users.user_id=notify_tbl.user_id JOIN bus_tbl ON bus_tbl.bus_id=notify_tbl.bus_id WHERE date_notified='$cdate'");
                                                $i=0;

                                                while ($row = mysqli_fetch_array($select)) {
                                                    $i++;


                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['firstname'];?></td>
                                                <td><?php echo $row['lastname'];?></td>
                                                <td><?php echo $row['phonenumber'];?></td>
                                                <td><?php echo $row['destination'];?></td>
                                                <td><?php echo $row['date_notified'];?></td>
                                                <td><?php echo $row['dipaturetime'];?></td>










                                            </tr>
                                            <?php
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                            </div>
                                            </div>
                                            </div>


                        </div> <!-- end row -->
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Blog end -->

       <?php
       include('footer.php');
       ?>

