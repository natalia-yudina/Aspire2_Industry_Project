<nav class="navbar user-navbar  navbar-expand-lg navbar-light bg-transparent py-4 px-5">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 fw-bold me-3 text-dark" id="menu-toggle"></i>
        <h2 class="fs-3 m-0"><?php if ($page == 'my-profile') {
                                    echo 'My Profile';
                                } ?></h2>
        <h2 class="fs-3 m-0"><?php if ($page == 'user-roster') {
                                    echo 'Roster';
                                } ?></h2>
        <h2 class="fs-3 m-0"><?php if ($page == 'update-work-days') {
                                    echo 'Update Work Days';
                                } ?></h2>

    </div>

    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <div class="user-dropdown" style="float:right;">
            <button class="dropbtn bg-transparent text-dark fs-6 fw-bold">
                <i class="fas fa-caret-down me-2 text-dark fs-5 "></i>Coach
            </button>
            <div class="user-dropdown-content">
                <a href="#">Profile Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </ul>


</nav>