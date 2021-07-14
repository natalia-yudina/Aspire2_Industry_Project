<?php
session_start();

if (isset($_SESSION['email'])) { ?>


    <?php
    require_once 'config.php';
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <?php include('includes/head.php'); ?>
        <style>
            .icon-color {
                color: #3b41f7;
            }

            .form-control {
                color: #212529;
                background-color: #121212;
                border: 1px solid #b8b8b8;
            }
        </style>
    </head>

    <body>
        <?php

        if ($_SESSION['role'] == '1') { ?>
            <div class="d-flex user-bg" id="wrapper">
                <!-- Sidebar -->
                <?php $page = 'my-profile';
                include('includes/user-sidebar.php'); ?>
                <!-- Sidebar END -->
                <div id="page-content-wrapper">
                    <!-- Top Navbar -->
                    <?php include('includes/user-nav.php'); ?>
                    <!-- Top Navbar END -->
                    <!-- Content -->
                    <div class="container-fluid py-1 ">
                        <div class="row content-bg px-3 py-3">
                            <div class="col-md-6 py-3 px-3">
                                <div class="d-flex px-4 user-info py-4">
                                    <div class="d-flex flex-column user-text">
                                        <div class="fw-bold pb-2">
                                            <i class="fas fa-circle fs-6 p-2" style="color:#feca11;;"></i>
                                            <?= $_SESSION['fname'] ?>
                                            <?= $_SESSION['lname'] ?>
                                        </div>
                                        <div><i class="fas fa-envelope fs-6 p-2"></i><?= $_SESSION['email'] ?></div>
                                        <div><i class="fas fa-mobile-alt  fs-6 p-2"></i> <?= $_SESSION['phone'] ?> </div>

                                        <div><i class="fas fa-map-marker-alt  fs-6 p-2"></i><?= $_SESSION['address'] ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 py-3 px-3 user-text">
                                <div class="d-flex justify-content-center user-info py-4">
                                    <div class="d-flex flex-column">
                                        <div class="text-center fw-bold pt-1">
                                            <i class="fas fa-user-edit fs-6" style="color:#feca11;;"></i>
                                            <p>Edit Profile</p>
                                        </div>
                                        <!-- Form Start-->

                                                <form action="">

                                                                   

                                                               


                                                        
                                                    <div class="row px-5 py-1">

                                                        <div class="col-md-6 form-group">
                                                            <label for="fname">First Name</label>
                                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="" >
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label for="lname">Last Name</label>
                                                            <input type="text" class="form-control" id="lname" name="lname" >
                                                        </div>

                                                        <div class="col-md-6 form-group pt-3">
                                                            <label for="email">E-mail</label>
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>

                                                        <div class="col-md-6 form-group pt-3">
                                                            <label for="phone">Contact Number</label>
                                                            <input type="phone" class="form-control" id="phone" name="phone">
                                                        </div>

                                                        <div class="col-md-12 form-group pt-3">
                                                            <label for="address">Address</label>
                                                            <input type="address" class="form-control" id="address" name="address">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="d-flex justify-content-end py-3">
                                                                <button type="button" class="btn py-3 w-100"> Update Profile </button>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </form>
                                       


                                        <!-- Form End -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->
            </div>


            <!-- Sidebar JS -->
            <script type="text/javascript" src="js/sidebar.js"></script>
            <!-- Bootstrap Bundle -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php } ?>
    </body>

    </html>

<?php } else {
    header("location: signin.php");
} ?>