<?php include ("../model/conne.php"); ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>BATS MIS | Manage Travel Orders</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <?php
  if (isset($_GET['tofe_id'])) {
    $tofe_id = $_GET['tofe_id'];
    $stmt = $conn->prepare("SELECT * FROM tof_employees WHERE tofe_id = ?");
    $stmt->bind_param("i", $tofe_id);
    $stmt->execute();
    $resultfileinfo = $stmt->get_result();

    if ($resultfileinfo->num_rows > 0) {
      $fileDataInfo = $resultfileinfo->fetch_assoc();
    }

    if (isset($_POST['Update'])) {
      $tof_id = $_POST['tof_id'];
      $e_id = $_POST['e_id'];

      $stmt = $conn->prepare("UPDATE tof_employees SET tof_id=?, e_id=? WHERE tofe_id=?");
      $stmt->bind_param("iii", $tof_id, $e_id, $tofe_id);

      if ($stmt->execute()) {
        echo "<script>
                alert('Edit Employee Information Successful!');
                window.location.href = 'manage-employees.php?tofe_id=$tofe_id';
              </script>";
      } else {
        echo "<script>
                alert('Edit Employee Information Error: $tofe_id');
                window.location.href = 'manage-employees.php?tofe_id=$tofe_id';
              </script>";
      }
    }
  } else {
    if (isset($_POST['Register'])) {
      $tof_id = $_POST['tof_id'];
      $e_id = $_POST['e_id'];

      $stmt = $conn->prepare("INSERT INTO tof_employees (tof_id, e_id) VALUES (?, ?)");
      $stmt->bind_param("ii", $tof_id, $e_id);

      if ($stmt->execute()) {
        echo "<script>
                alert('Insert Employee Information Successful!');
                window.location.href = window.location.href;
              </script>";
      } else {
        echo "<script>
                alert('Insert Employee Information Error');
                window.location.href = 'manage-employees.php';
              </script>";
      }
    }
  }
  ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include ("./nav.php"); ?>
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?php if (isset($_GET['tofe_id'])) { echo "Edit"; } else { echo "Register"; } ?> Employee/</span> Administrator</h4>
          <div class="row">
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Input Information</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-id">Employee ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="tofe_id" class="form-control" value="<?php echo $fileDataInfo['tofe_id'] ?? rand(99999, 999999); ?>" id="basic-default-id" placeholder="Employee ID" readonly />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-tof-id">TOF ID</label>
                      <div class="col-sm-10">
                        <input type="text" required name="tof_id" class="form-control" id="basic-default-tof-id" value="<?php echo $fileDataInfo['tof_id'] ?? ''; ?>" placeholder="TOF ID" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-e-id">Employee ID</label>
                      <div class="col-sm-10">
                        <input type="text" required name="e_id" class="form-control" id="basic-default-e-id" value="<?php echo $fileDataInfo['e_id'] ?? ''; ?>" placeholder="Employee ID" />
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" name="<?php echo isset($_GET['tofe_id']) ? "Update" : "Register"; ?>" class="btn btn-primary"><?php echo isset($_GET['tofe_id']) ? "Update" : "Register"; ?> Employee</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include ("./footer.php"); ?>
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
