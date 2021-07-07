<?php
require_once 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
</head>

<body>
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
                        <div class="d-flex justify-content-center user-info py-4">
                            <div class="d-flex flex-column user-text">
                                <div class="text-center fw-bold  ">
                                    <i class="fas fa-user-circle user-text fs-2"></i>
                                    <p style="color:#ffd75e;">Jhon Doe</p>
                                </div>
                                <div><i class="fas fa-mobile-alt second-text fs-6 p-2"></i> 022 558 22 36</div>
                                <div><i class="fas fa-envelope second-text fs-6 p-2"></i>jhon@gmail.com</div>
                                <div><i class="fas fa-map-marker-alt second-text fs-6 p-2"></i>457A Western Springs Rd.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 py-3 px-3 user-text">
                        <div class="d-flex justify-content-center user-info py-4">
                            <div class="d-flex flex-column">
                                <div class="text-center fw-bold">
                                    <i class="fas fa-edit user-text fs-3"></i>
                                    <p>Edit Profile</p>
                                </div>
                                <!-- Form Start-->
                             
                                <form>
                                    <!-- NI 02-06-2021 end -->
                                    <div class="form-group pt-3">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control px-5" id="fname" name="fname">
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname">
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="phone">Contact Number</label>
                                        <input type="phone" class="form-control" id="phone" name="phone">
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" id="address" name="address">
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn py-3"> Save </button>
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

</body>

</html>