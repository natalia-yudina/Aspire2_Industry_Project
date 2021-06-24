
<!-- Sidebar Starts -->

<div id="sidebar-wrapper">

<div class="sidebar-heading text-center py-4 brand-text fs-4 fw-bold text-uppercase border-bottom">
    MBSC Roster 
</div>

<div class="list-group list-group-flush my-3">
    <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text <?php if($page=='admin-dashboard') {echo 'active';} ?>">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($page=='roster') {echo 'active';} ?>">
    <i class="fas fa-clipboard-list me-2"></i>Roster
    </a>
    <a href="time-table.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($page=='time-table') {echo 'active';} ?>">
    <i class="far fa-calendar-alt me-2"></i>Time Table
    </a>
    <a href="add-time-table.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($page=='add-time-table') {echo 'active';} ?>">
    <i class="far fa-calendar-plus me-2"></i>Add Class
    </a>
    <a href="add-course.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($page=='add-course') {echo 'active';} ?>">
    <i class="fab fa-font-awesome-flag me-2"></i>Add Course
    </a>
    <a href="holidays.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if($page=='holidays') {echo 'active';} ?>">
    <i class="fas fa-plane me-2"></i>Holidays
    </a>
</div>

</div>
<!-- Sidebar Ends-->
