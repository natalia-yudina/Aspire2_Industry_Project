<?php
require_once 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <style>
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing {
            color: #a99595;
        }

        .dataTables_wrapper 
        .dataTables_paginate 
        .paginate_button.disabled,
         .dataTables_wrapper 
         .dataTables_paginate 
         .paginate_button.disabled:hover, 
         .dataTables_wrapper 
         .dataTables_paginate 
         .paginate_button.disabled:active {
    cursor: default;
    color: #ffda63 !important;
    border: 1px solid transparent;
    background: transparent;
    box-shadow: none;
}

.dataTables_wrapper .dataTables_length select {
    border: 1px solid #ffda63;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
    padding: 4px;
    color: #737373;
    font-weight: 600;
}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ffda63;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
    margin-left: 3px;
    color: #cdcdcd;
}

.dataTables_wrapper 
.dataTables_paginate 
.paginate_button.current, 
.dataTables_wrapper 
.dataTables_paginate 
.paginate_button.current:hover {
    border-radius: 6px;
}

.table>thead {
    vertical-align: bottom;
    background-color: #1b1b1b;
}

    </style>
</head>

<body>
    <div class="d-flex user-bg" id="wrapper">
        <!-- Sidebar -->
        <?php $page = 'update-work-days';
        include('includes/user-sidebar.php'); ?>
        <!-- Sidebar END -->
        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php include('includes/user-nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid">
                <div class="row d-flex g-3 my-2 content-bg justify-content-center">
                    <div class="col-md-12 px-5 py-3">
                        <!-- NI 01-07-2021 begin -->
                        <?php
                        // include('availabilitylist.php');
                        ?>
                          <div id="availability_data"></div>
                        <!-- NI 01-07-2021 end -->
                    </div>
                </div>
            </div>
            <!-- Content END -->
        </div>
    </div>

    <!-- Sidebar JS -->
    <script type="text/javascript" src="js/sidebar.js"></script>
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- NI 25-06-2021 begin -->
    <script src="js/availability.js"></script>
    <!-- NI 25-06-2021 end -->
</body>
</html>
