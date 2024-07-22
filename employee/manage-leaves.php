<?php include ("../model/conn.php"); ?>
<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>BATS MIS | Manage Administrator Information</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

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
  if (isset($_GET['leave_id'])) {
    $leave_id = $_GET['leave_id'];
    $stmt = $conn->prepare("SELECT * FROM leavemanagement WHERE leave_id = ?");
    $stmt->bind_param("i", $leave_id);
    $stmt->execute();
    $resultleaveinfo = $stmt->get_result();

    if ($resultleaveinfo->num_rows > 0) {
      // output data of each row
      $leaveDataInfo = $resultleaveinfo->fetch_assoc();
    }

    if (isset($_POST['Update'])) {
      if (isset($_POST['file_data'])) {
        $file = $_FILES['file_data'];
        $fileContent = file_get_contents($file['tmp_name']);

        // Retrieve updated values from the form
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $more_info = $_POST['more_info'];
        $leave_type = $_POST['leave_type'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];

        // Update query
        $stmt = $conn->prepare("UPDATE leavemanagement SET 
        user_id=?, user_type=?, more_info=?, leave_type=?, start_date=?, file_data=?, end_date=?, status=?
        WHERE leave_id=?");
        $stmt->bind_param("isssssssi", $user_id, $user_type, $more_info, $leave_type, $start_date, $fileContent, $end_date, $status, $leave_id);

        if ($stmt->execute()) {
          echo "<script>
                  alert('Edit Leave Information Successful!');
                  window.location.href = 'manage-leaves.php?leave_id=$leave_id';
                </script>";
        } else {
          echo "<script>
                  alert('Edit Leave Information Error: $leave_id');
                  window.location.href = 'manage-leaves.php?leave_id=$leave_id';
                </script>";
        }
      } else {


        // Retrieve updated values from the form
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $more_info = $_POST['more_info'];
        $leave_type = $_POST['leave_type'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];

        // Update query
        $stmt = $conn->prepare("UPDATE leavemanagement SET 
        user_id=?, user_type=?, more_info=?, leave_type=?, start_date=?,  end_date=?, status=?
        WHERE leave_id=?");
        $stmt->bind_param("issssssi", $user_id, $user_type, $more_info, $leave_type, $start_date, $end_date, $status, $leave_id);

        if ($stmt->execute()) {
          echo "<script>
                  alert('Edit Leave Information Successful!');
                  window.location.href = 'manage-leave.php?leave_id=$leave_id';
                </script>";
        } else {
          echo "<script>
                  alert('Edit Leave Information Error: $leave_id');
                  window.location.href = 'manage-leave.php?leave_id=$leave_id';
                </script>";
        }
      }
    }
  } else {
    if (isset($_POST['Register'])) {
      $file = $_FILES['file_data'];
      $fileContent = file_get_contents($file['tmp_name']);

      // Retrieve values from the form
      $user_id = $_POST['user_id'];
      $user_type = $_POST['user_type'];
      $more_info = $_POST['more_info'];
      $leave_type = $_POST['leave_type'];
      $start_date = $_POST['start_date'];
      $end_date = $_POST['end_date'];
      $status = $_POST['status'];

      // Insert query
      $stmt = $conn->prepare("INSERT INTO leavemanagement (user_id, user_type, more_info, leave_type, start_date, end_date, file_data, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("isssssss", $user_id, $user_type, $more_info, $leave_type, $start_date, $end_date, $fileContent, $status);

      if ($stmt->execute()) {
        echo "<script>
                  alert('Insert Leave Information Successful!');
                  window.location.href = window.location.href;
                </script>";
      } else {
        echo "<script>
                  alert('Insert Leave Information Error');
                  window.location.href = 'manage-leave.php';
                </script>";
      }
    }
  }





  ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include ("./nav.php"); ?>

      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php if (isset($_GET['user_id'])) {
            echo "Edit";
          } else {
            echo "Register";
          }
          ; ?> Information/</span> Administrator</h4>

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
                        <input type="text" name="leave_id" class="form-control"
                          value="<?php echo $leaveDataInfo['leave_id'] ?? rand(99999, 999999); ?>"
                          id="basic-default-name" placeholder="Leave ID" readonly />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">User ID</label>
                      <div class="col-sm-10">
                        <input readonly type="text" required class="form-control" name="user_id" id="basic-default-company"
                          placeholder="User ID" value="<?php echo $_SESSION['employee_id'] ?? ''; ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-email">User Type</label>
                      <div class="col-sm-10">
                      <input readonly type="text" required class="form-control" name="user_type" id="basic-default-company"
                      placeholder="User Type" value="employee" />
                      </div>
                    
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">More Info</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" class="form-control" placeholder="More Info"
                          name="more_info" required aria-describedby="basic-default-phone"
                          value="<?php echo $leaveDataInfo['more_info'] ?? ''; ?>" />
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
                      <label class="col-sm-2 col-form-label" for="basic-default-message">File</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control mb-2" placeholder="Start Date"
                          name="file_data" aria-describedby="basic-icon-default-message2" value="" type="file"
                          accept=".pdf" />
                        <?php if (!isset($_GET['leave_id'])) {
                          ?>


                          <a href="https://csc.gov.ph/downloads/category/298-mc-no-05-s-2021-amendment-to-omnibus-rules-on-leave-csc-mc-no-41-s-1998-as-amended"
                            class="btn btn-success m-1" target="_blank">Download Leave Files</a>
                          <?php
                        } else {

                          ?>
                          <iframe
                            src="data:application/pdf;base64,<?php echo base64_encode($leaveDataInfo['file_data']); ?>"
                            type="application/pdf" height="500px" width="100%"></iframe>

                        <?php } ?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Start Date</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="Start Date"
                          name="start_date" required aria-describedby="basic-icon-default-message2" type="date"
                          value="<?php echo $leaveDataInfo['start_date'] ?? ''; ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">End Date</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="End Date" name="end_date"
                          required aria-describedby="basic-icon-default-message2" type="date"
                          value="<?php echo $leaveDataInfo['end_date'] ?? ''; ?>" />
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
                          <option <?php if (($leaveDataInfo['status'] ?? '') == 'declined') {
                            echo " selected ";
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
                        }
                        ; ?>" class="btn btn-primary"><?php if (isset($_GET['leave_id'])) {
                           echo "Update";
                         } else {
                           echo "Register";
                         }
                         ; ?></button>
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
        <?php include ("./footer.php"); ?>
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