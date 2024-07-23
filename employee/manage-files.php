<?php include ("../model/conne.php"); ?>
<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>BATS MIS | Manage Files</title>

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
  if (isset($_GET['file_id'])) {
    $file_id = $_GET['file_id'];
    $stmt = $conn->prepare("SELECT * FROM files WHERE file_id = ?");
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $resultfileinfo = $stmt->get_result();

    if ($resultfileinfo->num_rows > 0) {
      $fileDataInfo = $resultfileinfo->fetch_assoc();
    }

    if (isset($_POST['Update'])) {
      if (isset($_FILES['file_path'])) {
        $file = $_FILES['file_path'];

        if($_POST['file_type']=="saln"){
          $filePath = '../files/employee/saln/' . $_POST['user_id']."-". basename($file['name']);
          move_uploaded_file($file['tmp_name'], $filePath);
        }
        else if($_POST['file_type']=="pds"){
          $filePath = '../files/employee/pds/' . $_POST['user_id']."-".basename($file['name']);
          move_uploaded_file($file['tmp_name'], $filePath);
        }
        else if($_POST['file_type']=="other"){
          $filePath = '../files/employee/others/' . $_POST['user_id']."-".basename($file['name']);
          move_uploaded_file($file['tmp_name'], $filePath);
        }
        
        

        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $file_type = $_POST['file_type'];
        $file_description = $_POST['file_description'];
        $f_status = $_POST['f_status'];

        $stmt = $conn->prepare("UPDATE files SET user_id=?, user_type=?, file_type=?, file_description=?, file_path=?, f_status=? WHERE file_id=?");
        $stmt->bind_param("isssssi", $user_id, $user_type, $file_type, $file_description, $filePath, $f_status, $file_id);

        if ($stmt->execute()) {
          echo "<script>
                  alert('Edit File Information Successful!');
                  window.location.href = 'manage-files.php?file_id=$file_id';
                </script>";
        } else {
          echo "<script>
                  alert('Edit File Information Error: $file_id');
                  window.location.href = 'manage-files.php?file_id=$file_id';
                </script>";
        }
      } else {
        $user_id = $_POST['user_id'];
        $user_type = $_POST['user_type'];
        $file_type = $_POST['file_type'];
        $file_description = $_POST['file_description'];
        $f_status = $_POST['f_status'];

        $stmt = $conn->prepare("UPDATE files SET user_id=?, user_type=?, file_type=?, file_description=?, f_status=? WHERE file_id=?");
        $stmt->bind_param("issssi", $user_id, $user_type, $file_type, $file_description, $f_status, $file_id);

        if ($stmt->execute()) {
          echo "<script>
                  alert('Edit File Information Successful!');
                  window.location.href = 'manage-files.php?file_id=$file_id';
                </script>";
        } else {
          echo "<script>
                  alert('Edit File Information Error: $file_id');
                  window.location.href = 'manage-files.php?file_id=$file_id';
                </script>";
        }
      }
    }
  } else {
    if (isset($_POST['Register'])) {
      $file = $_FILES['file_path'];
      if($_POST['file_type']=="saln"){
        $filePath = '../files/employee/saln/' . $_POST['user_id']."-". basename($file['name']);
        move_uploaded_file($file['tmp_name'], $filePath);
      }
      else if($_POST['file_type']=="pds"){
        $filePath = '../files/employee/pds/' . $_POST['user_id']."-".basename($file['name']);
        move_uploaded_file($file['tmp_name'], $filePath);
      }
      else if($_POST['file_type']=="other"){
        $filePath = '../files/employee/others/' . $_POST['user_id']."-".basename($file['name']);
        move_uploaded_file($file['tmp_name'], $filePath);
      }

      $user_id = $_POST['user_id'];
      $user_type = $_POST['user_type'];
      $file_type = $_POST['file_type'];
      $file_description = $_POST['file_description'];
      $f_status = $_POST['f_status'];

      $stmt = $conn->prepare("INSERT INTO files (user_id, user_type, file_type, file_description, file_path, f_status) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("isssss", $user_id, $user_type, $file_type, $file_description, $filePath, $f_status);

      if ($stmt->execute()) {
        echo "<script>
                  alert('Insert File Information Successful!');
                  window.location.href = window.location.href;
                </script>";
      } else {
        echo "<script>
                  alert('Insert File Information Error');
                  window.location.href = 'manage-files.php';
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
          ; ?> File/</span> Employee</h4>

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
                      <label class="col-sm-2 col-form-label" for="basic-default-id">File ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="file_id" class="form-control" value="<?php echo $fileDataInfo['file_id'] ?? rand(99999, 999999); ?>" id="basic-default-id" placeholder="File ID" readonly />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-user-id">User ID</label>
                      <div class="col-sm-10">
                        <input <?php if(isset($_GET['file_id'])){ echo " readonly "; }  ?> type="text" required class="form-control" name="user_id" id="basic-default-user-id" placeholder="User ID" value="<?php  if(isset($_GET['file_id'])){ echo $fileDataInfo['user_id']; } else{ echo $_SESSION['employee_id'] ?? ''; } ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-user-type">User Type</label>
                      <div class="col-sm-10">
                        <input readonly type="text" required class="form-control" name="user_type" id="basic-default-user-type" placeholder="User Type" value="employee" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-file-type">File Type</label>
                      <div class="col-sm-10">
                        <select name="file_type" id="file_type" class="form-control">
                          <option <?php echo (isset($fileDataInfo['file_type']) && $fileDataInfo['file_type'] == 'pds') ? "selected" : ""; ?> value="pds">PDS</option>
                          <option <?php echo (isset($fileDataInfo['file_type']) && $fileDataInfo['file_type'] == 'saln') ? "selected" : ""; ?> value="saln">SALN</option>
                          <option <?php echo (isset($fileDataInfo['file_type']) && $fileDataInfo['file_type'] == 'other') ? "selected" : ""; ?> value="other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-file-description">File Description</label>
                      <div class="col-sm-10">
                        <textarea required name="file_description" id="basic-default-file-description" class="form-control"><?php echo $fileDataInfo['file_description'] ?? ''; ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-file-path">File Path</label>
                      <div class="col-sm-10">
                        <input type="file" name="file_path" class="form-control" accept=".xls, .xlsx" id="basic-default-file-path" placeholder="File Path" />
                        <?php if (isset($fileDataInfo['file_path'])): ?>
                          <small>Current file: <a href="<?php echo $fileDataInfo['file_path']; ?>" target="_blank" class="btn btn-primary m-1">Download</a></small>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-status">File Status</label>
                      <div class="col-sm-10">
                        <select name="f_status" id="basic-default-status" class="form-control">
                          <option <?php echo (isset($fileDataInfo['f_status']) && $fileDataInfo['f_status'] == 'Saved') ? " selected " : ""; ?> value="Saved">Saved</option>
                          <option <?php echo (isset($fileDataInfo['f_status']) && $fileDataInfo['f_status'] == 'Deleted') ? " selected " : ""; ?> value="Deleted">Deleted</option>
                        </select>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" name="<?php echo isset($_GET['file_id']) ? "Update" : "Register"; ?>" class="btn btn-primary"><?php echo isset($_GET['file_id']) ? "Update" : "Register"; ?> File</button>
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