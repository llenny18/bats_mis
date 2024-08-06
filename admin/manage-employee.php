<?php include("../model/conn.php"); ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>BATS MIS | Manage Employee Information</title>
  <meta name="description" content="" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <!-- Page CSS -->
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
</head>
<body>
  <!-- Layout wrapper -->
  <?php
  if (isset($_GET['employee_id'])) {
    $sqlemployeemanage = "SELECT * FROM employeedetails WHERE employee_id = '{$_GET['employee_id']}'";
    $resultemployeeinfo = $conn->query($sqlemployeemanage);

    if ($resultemployeeinfo->num_rows > 0) {
      // output data of each row
      $employeeDataInfo = $resultemployeeinfo->fetch_assoc();
    }

    if (isset($_POST['Update'])) {
      // Retrieve updated values from the form
      $employee_id = $_POST['employee_id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $date_of_birth = $_POST['date_of_birth'];
      $email = $_POST['email'];
      $phone_number = $_POST['phone_number'];
      $user_name = $_POST['user_name'];
      $user_password = $_POST['user_password'];
      $employment_type = $_POST['employment_type'];
     
      $position = $_POST['position'];
      
      // Update query
      $sqlupdate = "UPDATE employeedetails SET 
        first_name='$first_name',
        last_name='$last_name',
        date_of_birth='$date_of_birth',
        email='$email',
        phone_number='$phone_number',
        user_name='$user_name',
        user_password='$user_password',
        employment_type='$employment_type',
        position='$position'
      
        WHERE employee_id='$employee_id'";

      if ($conn->query($sqlupdate) === TRUE) {
  ?>
        <script>
          alert('Edit Information Successful!');
          window.location.href = 'manage-employee.php?employee_id=<?= $_GET['employee_id'] ?>'
        </script>
      <?php
      } else {
      ?>
        <script>
          alert('Edit Information Error: <?= $_GET['employee_id'] ?>');
          window.location.href = 'manage-employee.php?employee_id=<?= $_GET['employee_id'] ?>'
        </script>
      <?php
      }
    }
  } else {
    if (isset($_POST['Register'])) {
      // Retrieve values from the form
      $employee_id = $_POST['employee_id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $date_of_birth = $_POST['date_of_birth'];
      $email = $_POST['email'];
      $phone_number = $_POST['phone_number'];
      $user_name = $_POST['user_name'];
      $user_password = $_POST['user_password'];
      $employment_type = $_POST['employment_type'];
      $position = $_POST['position'];
      

      // Insert query
      $sqlinsert = "INSERT INTO employeedetails (employee_id, first_name, last_name, date_of_birth, email, phone_number, user_name, user_password, employment_type, position) VALUES (
        '$employee_id',
        '$first_name',
        '$last_name',
        '$date_of_birth',
        '$email',
        '$phone_number',
        '$user_name',
        '$user_password',
        '$employment_type',
        '$position')";

      if ($conn->query($sqlinsert) === TRUE) {
      ?>
        <script>
          alert('Insert Information Successful!');
          window.location.href = window.location.href
        </script>
      <?php
      } else {
      ?>
        <script>
          alert('Insert Information Error ');
          window.location.href = 'manage-employee.php?employee_id=<?= $_GET['employee_id'] ?>'
        </script>
  <?php
      }
    }
  }
  ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php include("./nav.php"); ?>
      <!-- / Navbar -->
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php if (isset($_GET['employee_id'])) {
                                                                            echo "Edit";
                                                                          } else {
                                                                            echo "Register";
                                                                          }; ?> Information/</span> Employee</h4>
          <!-- Basic Layout & Basic with Icons -->
          <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Input Information</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-name">Employee ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="employee_id" class="form-control" value="<?= $employeeDataInfo['employee_id'] ?? rand(99999, 999999) ?>" id="basic-default-name" placeholder="Employee ID" readonly />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-firstname">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" required class="form-control" name="first_name" id="basic-default-firstname" placeholder="First Name" value="<?= $employeeDataInfo['first_name'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-lastname">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" required class="form-control" name="last_name" id="basic-default-lastname" placeholder="Last Name" value="<?= $employeeDataInfo['last_name'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-dob">Date of Birth</label>
                      <div class="col-sm-10">
                        <input type="date" required class="form-control" name="date_of_birth" id="basic-default-dob" placeholder="YYYY-MM-DD" value="<?= $employeeDataInfo['date_of_birth'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                      <div class="col-sm-10">
                        <input type="email" id="basic-default-email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-default-email2" value="<?= $employeeDataInfo['email'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone Number</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" class="form-control" placeholder="Phone Number" name="phone_number" aria-describedby="basic-default-phone" value="<?= $employeeDataInfo['phone_number'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Position</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" class="form-control" placeholder="Position" name="position" aria-describedby="basic-default-phone" value="<?= $employeeDataInfo['position'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-username">Username</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-username" class="form-control" placeholder="Username" name="user_name" aria-describedby="basic-default-username2" value="<?= $employeeDataInfo['user_name'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-password">Password</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-password" class="form-control" placeholder="Password" name="user_password" aria-describedby="basic-default-password" value="<?= $employeeDataInfo['user_password'] ?? '' ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-employmenttype">Employment Type</label>
                      <div class="col-sm-10">
                        <select name="employment_type" id="employment_type" class="form-control">
                          <option <?php if (($employeeDataInfo['employment_type'] ?? '') == 'permanent') {
                                    echo " selected ";
                                  } ?> value="permanent">Permanent</option>
                          <option <?php if (($employeeDataInfo['employment_type'] ?? '') == 'casual') {
                                    echo " selected ";
                                  } ?> value="casual">Casual</option>
                          <option <?php if (($employeeDataInfo['employment_type'] ?? '') == 'job_order') {
                                    echo " selected ";
                                  } ?> value="job_order">Job Order</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" name="<?php if (isset($_GET['employee_id'])) {
                                                      echo "Update";
                                                    } else {
                                                      echo "Register";
                                                    }; ?>" class="btn btn-primary"><?php if (isset($_GET['employee_id'])) {
                                                                                                                                                                echo "Update";
                                                                                                                                                              } else {
                                                                                                                                                                echo "Register";
                                                                                                                                                              }; ?></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Basic with Icons -->
          </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        <?php include("./footer.php"); ?>
        <!-- / Footer -->
        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->
  <!-- Vendors JS -->
  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>
  <!-- Page JS -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
