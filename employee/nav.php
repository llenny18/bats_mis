<?php
if(!isset($_SESSION['employee_id'])){
  echo "<script>window.location.href='login.php';</script>";
}
else{
  $sqluser = "SELECT * FROM employeedetails where employee_id = '{$_SESSION['employee_id']}'";
$resultuserdata = $conn->query($sqluser);

if ($resultuserdata->num_rows > 0) {
  // output data of each row
  $userData = $resultuserdata->fetch_assoc();
}
}


?>


<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                
                <img src="../assets/img/logo.png" style="height: 100px;" alt="">
              </span>
              
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="calendar.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Basic">Calendar</div>
              </a>
            </li>
            <!-- Layouts -->
           

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Account Settings">Attendance</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="employees-present.php" class="menu-link">
                    <div data-i18n="Account">List of Present</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="employees-absent.php" class="menu-link">
                    <div data-i18n="Notifications">List of Absent</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="employees-leave.php" class="menu-link">
                    <div data-i18n="Connections">List of On-Leave</div>
                  </a>
                </li>
                
                
              </ul>
            </li>
            
           
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Leave Management</span></li>
            <!-- Cards -->
           

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Extended UI">File a Leave</div>
              </a>
              <ul class="menu-sub">
                
              <li class="menu-item">
                  <a href="leaves.php" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Leave Status</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="manage-leaves.php" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Leave Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="travel_orders.php" class="menu-link">
                    <div data-i18n="Text Divider">Travel Order Form</div>
                  </a>
                </li>
              </ul>
            </li>

           
          
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
               
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               
                <?= $userData['first_name'] . " ". $userData['last_name'] ?>
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    
                    <div class="avatar avatar-online">
                      
                      <img src="data:image/jpeg;base64, <?php echo base64_encode($userData['user_icon']) ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="data:image/jpeg;base64, <?php echo base64_encode($userData['user_icon']) ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $userData['first_name'] . " ". $userData['last_name'] ?></span>
                            <small class="text-muted"><?= ucwords($userData['employment_type']) ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="view-efiles.php?user_id=<?= $_SESSION['employee_id']?>">
                        <i class="bx bx-file-blank me-2"></i>
                        <span class="align-middle">My Files</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" target="_blank" href="dtrtable.php?e_id=<?= $_SESSION['employee_id']?>">
                        <i class="bx bx-list-ul me-2"></i>
                        <span class="align-middle">My Logs</span>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>