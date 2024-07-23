<?php include ("../model/conn.php"); ?>
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
    $stmt = $conn->prepare("SELECT * FROM tof_employees WHERE tof_id = ?");
    $stmt->bind_param("i", $tofe_id);
    $stmt->execute();
    $resultfileinfo = $stmt->get_result();

    if ($resultfileinfo->num_rows > 0) {
        $fileDataInfo = $resultfileinfo->fetch_assoc();
    }

    if (isset($_POST['Update'])) {
        $tof_id = $_POST['tof_id'];
        $e_id1 = $_POST['e_id1'];
      $e_id2 = $_POST['e_id2'];
      $e_id3 = $_POST['e_id3'];
      $e_id4 = $_POST['e_id4'];
      $e_id5 = $_POST['e_id5'];
      $e_id6 = $_POST['e_id6'];
      $e_id7 = $_POST['e_id7'];
      $e_id8 = $_POST['e_id8'];
      $e_id9 = $_POST['e_id9'];
      $e_id10 = $_POST['e_id10'];
      $e_id11 = $_POST['e_id11'];
      $e_id12 = $_POST['e_id12'];
      $e_id13 = $_POST['e_id13'];
      $e_id14 = $_POST['e_id14'];
      $e_id15 = $_POST['e_id15'];
      $e_id16 = $_POST['e_id16'];
      $e_id17 = $_POST['e_id17'];
      $e_id18 = $_POST['e_id18'];
      $e_id19 = $_POST['e_id19'];
      $e_id20 = $_POST['e_id20'];

        $stmt = $conn->prepare("UPDATE tof_employees SET tof_id=?, e_id1=?, e_id2=?, e_id3=?, e_id4=?, e_id5=?, e_id6=?, e_id7=?, e_id8=?, e_id9=?, e_id10=?, e_id11=?, e_id12=?, e_id13=?, e_id14=?, e_id15=?, e_id16=?, e_id17=?, e_id18=?, e_id19=?, e_id20=? WHERE tof_id=?");
        $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiii", $tof_id, $e_id1,  $e_id2,  $e_id3,  $e_id4,  $e_id5,  $e_id6,  $e_id17,  $e_id8,  $e_id9,  $e_id10,  $e_id11,  $e_id12,  $e_id13,  $e_id14,  $e_id15,  $e_id16,  $e_id17,  $e_id18,  $e_id19,  $e_id20, $tofe_id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Employee List Information Successful!');
                    window.location.href = 'travel_orders.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Employee Information Error: $tofe_id');
                    window.location.href = 'travel_orders.php';
                  </script>";
        }
    }
} else {




    if (isset($_POST['Register'])) {
        $tof_id = $_POST['tof_id'];
        $e_id1 = $_POST['e_id1'];
      $e_id2 = $_POST['e_id2'];
      $e_id3 = $_POST['e_id3'];
      $e_id4 = $_POST['e_id4'];
      $e_id5 = $_POST['e_id5'];
      $e_id6 = $_POST['e_id6'];
      $e_id7 = $_POST['e_id7'];
      $e_id8 = $_POST['e_id8'];
      $e_id9 = $_POST['e_id9'];
      $e_id10 = $_POST['e_id10'];
      $e_id11 = $_POST['e_id11'];
      $e_id12 = $_POST['e_id12'];
      $e_id13 = $_POST['e_id13'];
      $e_id14 = $_POST['e_id14'];
      $e_id15 = $_POST['e_id15'];
      $e_id16 = $_POST['e_id16'];
      $e_id17 = $_POST['e_id17'];
      $e_id18 = $_POST['e_id18'];
      $e_id19 = $_POST['e_id19'];
      $e_id20 = $_POST['e_id20'];

        $stmt = $conn->prepare("INSERT INTO tof_employees (tof_id, e_id1, e_id2, e_id3, e_id4, e_id5, e_id6, e_id7, e_id8, e_id9, e_id10, e_id11, e_id12, e_id13, e_id14, e_id15, e_id16, e_id17, e_id18, e_id19, e_id20) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiiiiiiiiiiiiiiiiii", $tof_id, $e_id1,  $e_id2,  $e_id3,  $e_id4,  $e_id5,  $e_id6,  $e_id17,  $e_id8,  $e_id9,  $e_id10,  $e_id11,  $e_id12,  $e_id13,  $e_id14,  $e_id15,  $e_id16,  $e_id17,  $e_id18,  $e_id19,  $e_id20,);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Insert Employee Information Successful!');
                    window.location.href = window.location.href;
                  </script>";
        } else {
            echo "<script>
                    alert('Insert Employee Information Error');
                    window.location.href = 'travel_orders.php';
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
                        <input type="text" required name="tof_id" class="form-control" id="basic-default-tof-id" value="<?php echo $fileDataInfo['tof_id'] ?? ''; ?>" placeholder="TOF ID" readonly/>
                      </div>
                    </div>
                   
                    <?php
                  
                    for($i =1; $i<=20;$i++){
                      

                      ?>
                      <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-e-id">Employee <?= $i ?></label>
                      <div class="col-sm-10">
                        <select name="e_id<?=$i?>" id="e_id" class="form-control">
                        <option value="0">--Select Employee--</option>
                      
                        <?php 
                        $useridemp = $fileDataInfo['e_id'.$i] ?? 0;
                        
                        displayEmployeesSelectBoxChoice($conn, $useridemp) ?>
                        </select>
                       
                      </div>
                    </div>
                      <?php

                      }
                    ?>  



                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" name="<?php echo isset($_GET['tofe_id']) ? "Update" : "Register"; ?>" class="btn btn-primary"><?php echo isset($_GET['tofe_id']) ? "Update" : "Register"; ?> Employee List for Travel Order</button>
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
