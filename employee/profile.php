<?php include("../model/conn.php"); ?>
<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>BATS MIS | Profile</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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
  <?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['updateAccount'])) {
      // Retrieve form data
      $employee_id = $_POST['employee_id'];
      $user_name = $_POST['username'];
      $user_password = $_POST['password'];
      $employment_type = $_POST['employment_type'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $date_of_birth = $_POST['date_of_birth'];
      $email = $_POST['email'];
      $phone_number = $_POST['phone_number'];
      
      // Update employee data in the database
      $updateQuery = "UPDATE employeedetails 
                      SET user_name = ?, user_password = ?, employment_type = ?, first_name = ?, last_name = ?, date_of_birth = ?, email = ?, phone_number = ?
                      WHERE employee_id = ?";
      $stmt = $conn->prepare($updateQuery);
      $stmt->bind_param("ssssssssi", $user_name, $user_password, $employment_type, $first_name, $last_name, $date_of_birth, $email, $phone_number,  $employee_id);
      $stmt->execute();
      
      if ($stmt->affected_rows > 0) {
          echo "<script>alert('Employee details updated successfully'); window.location.href = 'index.php';</script>";
        } else {
          echo "<script>alert('No changes made.'); window.location.href = 'index.php';</script>";
      }
  } else if (isset($_POST['deactivateAccount'])) {
      // Deactivate employee account
      $employee_id = $_SESSION['employee_id'];
      
      // Update the status field to 'Deleted'
      $deactivateQuery = "UPDATE employeedetails SET e_status = 'Deleted' WHERE employee_id = ?";
      $stmt = $conn->prepare($deactivateQuery);
      $stmt->bind_param("i", $employee_id);
      $stmt->execute();
      
      if ($stmt->affected_rows > 0) {
          echo "<script>alert('Account deactivated successfully'); window.location.href = 'logout.php';</script>";
        } else {
          echo "<script>alert('Failed to deactivate account'); window.location.href = 'index.php';</script>";
      }
  }
}
?>


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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Profile</h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Admin ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="employee_id"
                              value="<?= $userData['employee_id']  ?>"
                              readonly
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">First Name</label>
                            <input class="form-control" type="text" name="first_name" id="lastName" value="<?= $userData['first_name']  ?>" />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="last_name" id="lastName" value="<?=  $userData['last_name']  ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?= $userData['email']  ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Employment Type</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="employment_type"
                              value="<?= $userData['employment_type']  ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">PH (+639)</span>
                              <input
                                type="text"
                                id="phoneNumber"
                                name="phone_number"
                                class="form-control"
                                placeholder="0934234422"
                                value="<?= $userData['phone_number']  ?>"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="address"  value="<?= $userData['date_of_birth']  ?>" name="date_of_birth" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Username</label>
                            <input class="form-control" type="text" value="<?= $userData['user_name']  ?>" id="state" name="username" placeholder="California" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Password</label>
                            <input
                              type="text"
                              class="form-control"
                              id="zipCode"
                              name="password"
                              placeholder="231465"
                              value="<?= $userData['user_password']  ?>"
                         
                            />
                          </div>
                   
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="updateAccount" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Deactivate Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to deactivate your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" method="post">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" name="deactivateAccount" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>
                </div>
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
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
