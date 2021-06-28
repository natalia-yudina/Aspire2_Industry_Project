
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-5">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-3 m-0"><?php if($page=='roster') {echo 'Roster';} ?></h2>
                    <h2 class="fs-3 m-0"><?php if($page=='add-course') {echo 'Add Course';} ?></h2>
                    <h2 class="fs-3 m-0"><?php if($page=='add-time-table') {echo 'Add Class';} ?></h2>
                    <h2 class="fs-3 m-0"><?php if($page=='holidays') {echo 'Holidays';} ?></h2>
                    <h2 class="fs-3 m-0"><?php if($page=='time-table') {echo 'Time Table';} ?></h2>
                    
                </div>
                
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <div class="user-dropdown" style="float:right;">
                            <button class="dropbtn">
                                <i class="fas fa-caret-down me-2 toggle-icon"></i>Head Coach
                            </button>
                            <div class="user-dropdown-content">
                            <a href="#">Profile Settings</a>
                            <a href="#">Logout</a>
                            </div>
                          </div>
                    </ul>
              
               
            </nav>