<?php include("../model/conn.php"); ?>
<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>BATS MIS | Manage Administrator Information</title>

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
  if (isset($_GET['user_id'])) {


    $sqlusermanage = "SELECT * FROM users where user_id = '{$_GET['user_id']}'";
    $resultuserinfo = $conn->query($sqlusermanage);

    if ($resultuserinfo->num_rows > 0) {
      // output data of each row
      $userDataInfo = $resultuserinfo->fetch_assoc();
    }


    if (isset($_POST['Update'])) {
      // Retrieve updated values from the form
      $user_id = $_POST['user_id'];
      $name = $_POST['name'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $role = $_POST['role'];
      $contact_number = $_POST['contact_number'];
      $address = $_POST['address'];

      // Update query
      $sqlupdate = "UPDATE users SET 
        name='$name',
        username='$username',
        password='$password',
        email='$email',
        role='$role',
        contact_number='$contact_number',
        address='$address'
        WHERE user_id='$user_id'";

      if ($conn->query($sqlupdate) === TRUE) {
  ?>
        <script>
          alert('Edit Information Succesful!');
          window.location.href = 'manage-admin.php?user_id=<?= $_GET['user_id'] ?>'
        </script>


      <?php
      } else {
      ?>

        <script>
          alert('Edit Information Error: <?= $_GET['user_id'] ?>');
          window.location.href = 'manage-admin.php?user_id=<?= $_GET['user_id'] ?>'
        </script>

      <?php
      }
    }
  } else {

    if (isset($_POST['Register'])) {
      // Retrieve values from the form
      $user_id = $_POST['user_id'];
      $name = $_POST['name'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $role = $_POST['role'];
      $contact_number = $_POST['contact_number'];
      $address = $_POST['address'];

      // Insert query
      $sqlinsert = "INSERT INTO users (user_id, name, username, password, email, role, contact_number, address) VALUES (
        '$user_id',
        '$name',
        '$username',
        '$password',
        '$email',
        '$role',
        '$contact_number',
        '$address')";

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
          window.location.href = 'manage-admin.php?user_id=<?= $_GET['user_id'] ?>'
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
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php if (isset($_GET['user_id'])) {
                                                                            echo "Edit";
                                                                          } else {
                                                                            echo "Register";
                                                                          }; ?> Information/</span> Administrator</h4>

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
    <label class="col-sm-2 col-form-label" for="basic-default-name">Leave ID</label>
    <div class="col-sm-10">
      <input type="text" name="leave_id" class="form-control" value="<?php echo $leaveDataInfo['leave_id'] ?? rand(99999, 999999); ?>" id="basic-default-name" placeholder="Leave ID" readonly />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-company">User ID</label>
    <div class="col-sm-10">
      <input type="text" required class="form-control" name="user_id" id="basic-default-company" placeholder="User ID" value="<?php echo $leaveDataInfo['user_id'] ?? ''; ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-email">User Type</label>
    <div class="col-sm-10">
      <select name="user_type" id="user_type" class="form-control">
        <option <?php if (($leaveDataInfo['user_type'] ?? '') == 'employee') {
                  echo " selected ";
                } ?> value="employee">Employee</option>
        <option <?php if (($leaveDataInfo['user_type'] ?? '') == 'admin') {
                  echo " selected ";
                } ?> value="admin">Admin</option>
      </select>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-phone">More Info</label>
    <div class="col-sm-10">
      <input type="text" id="basic-default-phone" class="form-control" placeholder="More Info" name="more_info" required aria-describedby="basic-default-phone" value="<?php echo $leaveDataInfo['more_info'] ?? ''; ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-message">Leave Type</label>
    <div class="col-sm-10">
      <select name="leave_type" id="leave_type" class="form-control">
        <option <?php if (($leaveDataInfo['leave_type'] ?? '') == 'sick') {
                  echo " selected ";
                } ?> value="sick">Sick</option>
        <option <?php if (($leaveDataInfo['leave_type'] ?? '') == 'vacation') {
                  echo " selected ";
                } ?> value="vacation">Vacation</option>
        <option <?php if (($leaveDataInfo['leave_type'] ?? '') == 'emergency') {
                  echo " selected ";
                } ?> value="emergency">Emergency</option>
      </select>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-message">Start Date</label>
    <div class="col-sm-10">
      <input id="basic-default-message" class="form-control" placeholder="Start Date" name="start_date" required aria-describedby="basic-icon-default-message2" value="<?php echo $leaveDataInfo['start_date'] ?? ''; ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-message">End Date</label>
    <div class="col-sm-10">
      <input id="basic-default-message" class="form-control" placeholder="End Date" name="end_date" required aria-describedby="basic-icon-default-message2" value="<?php echo $leaveDataInfo['end_date'] ?? ''; ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
    <div class="col-sm-10">
      <select name="status" id="status" class="form-control">
        <option <?php if (($leaveDataInfo['status'] ?? '') == 'pending') {
                  echo " selected ";
                } ?> value="pending">Pending</option>
        <option <?php if (($leaveDataInfo['status'] ?? '') == 'approved') {
                  echo " selected ";
                } ?> value="approved">Approved</option>
        <option <?php if (($leaveDataInfo['status'] ?? '') == 'declined') {echo " selected ";
                } ?> value="declined">Declined</option>
      </select>

    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col-sm-10">
      <button type="submit" name="<?php if (isset($_GET['leave_id'])) {
                                    echo "Update";
                                  } else {
                                    echo "Register";
                                  }; ?>" class="btn btn-primary"><?php if (isset($_GET['leave_id'])) {
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