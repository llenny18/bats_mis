<?php include("../model/conn.php"); ?>
<!DOCTYPE html>



<?php
if (isset($_GET['user_id'])) {


  $sqlusermanage = "SELECT * FROM users where user_id = '{$_GET['user_id']}'";
  $resultuserinfo = $conn->query($sqlusermanage);

  if ($resultuserinfo->num_rows > 0) {
    // output data of each row
    $userDataInfo = $resultuserinfo->fetch_assoc();
  }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
<script>alert('Edit Information Succesful!');window.location.href='edit-admin.php?user_id=<?= $_GET['user_id'] ?>'</script>
    

  <?php
  } else {
  ?>

    <script>alert('Edit Information Error: <?= $_GET['user_id'] ?>');window.location.href='edit-admin.php?user_id=<?= $_GET['user_id'] ?>'</script>

<?php
  }
}



?>

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
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include("./nav.php"); ?>

      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Information/</span> Administrator</h4>
         
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
                      <label class="col-sm-2 col-form-label" for="basic-default-name">User ID</label>
                      <div class="col-sm-10">
                        <input type="text" name="user_id" class="form-control" value="<?= $userDataInfo['user_id'] ?>" id="basic-default-name" placeholder="User ID" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label"  for="basic-default-company">Full Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="basic-default-company" placeholder="Full Name" value="<?= $userDataInfo['name'] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-email">Username</label>
                      <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                          <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" name="username" aria-label="john.doe" aria-describedby="basic-default-email2" value="<?= $userDataInfo['username'] ?>" />
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Password</label>
                      <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="password" name="password" aria-describedby="basic-default-phone" value="<?= $userDataInfo['password'] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Email</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="email" value="<?= $userDataInfo['email'] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Role</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="role" value="<?= $userDataInfo['role'] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Contact Number</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="contact_number" value="<?= $userDataInfo['contact_number'] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Address</label>
                      <div class="col-sm-10">
                        <input id="basic-default-message" class="form-control" placeholder="" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2" name="address" value="<?= $userDataInfo['address'] ?>" />
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
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