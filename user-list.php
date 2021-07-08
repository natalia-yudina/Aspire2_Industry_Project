<?php
        // KU 08-07-2021 begin
        // include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";
        require_once 'config.php';
        // KU 08-07-2021 end
        ?>


        <!doctype html>
        <html lang="en">

        <head>
            <?php include('includes/head.php'); ?>
        </head>

        <body>
            <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <?php $page = 'user-list';
                include('includes/sidebar.php'); ?>

                <!-- Sidebar END -->

                <!-- Content Start -->
                <div id="page-content-wrapper">
                    <!-- Top Navbar -->
                    <?php $page = 'user-list';
                    include('includes/nav.php'); ?>
                    <!-- Top Navbar END -->
                    <!-- Content -->
                    <div class="container-fluid ">
                        <div class="row d-flex g-3 my-2 content-bg justify-content-center shadow ">
                            <div class="container p-3">
                                <?php include('users-table.php'); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Content END -->
            </div>

            <!-- Sidebar JS -->
            <script type="text/javascript" src="js/sidebar.js"></script>
            <!-- Bootstrap Bundle -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        </body>

        </html>