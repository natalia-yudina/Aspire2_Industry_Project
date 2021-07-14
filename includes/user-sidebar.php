<!-- Sidebar Starts -->
<div id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 brand-text fs-4 fw-bold text-uppercase border-bottom">
        <span class="ui-text">MBSC</span> Roster
        <span class="admin-text">Coach Panel v1</span>
    </div>

    <div class="list-group list-group-flush my-3">
        <a href="my-profile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if ($page == 'my-profile') {echo 'active';} ?>                                                                                                                echo 'active';                                                                                                            } ?>">
            <i class="fas fa-user me-2"></i>My Profile
        </a>
        <a href="update-work-days.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if ($page == 'update-work-days' ) {echo 'active';} ?>                                                                                                                  } ?>">
            <i class="fas fa-sync-alt me-2"></i>My Availabile Days
        </a>
        <a href="user-roster.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php if ($page == 'user-roster') {echo 'active';} ?>                                                                                                          } ?>">
            <i class="far fa-calendar-alt me-2"></i>Roster
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-transparent fw-bold logout-text pt-5">
            <i class="fas fa-sign-out-alt  me-2"></i>Logout
        </a>

    </div>
</div>
<!-- Sidebar Ends-->