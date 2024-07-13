<?php include("../model/conn.php"); ?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
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

    <title>Badges - UI elements | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg" />

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

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Badges</h4>

              <div class="row">
                <!-- Basic Badges -->
                <div class="col-lg">
                  <div class="card mb-4">
                    <h5 class="card-header">Basic Badges</h5>
                    <div class="card-body">
                      <div class="text-light small fw-semibold">Default</div>
                      <div class="demo-inline-spacing">
                        <span class="badge bg-primary">Primary</span>
                        <span class="badge bg-secondary">Secondary</span>
                        <span class="badge bg-success">Success</span>
                        <span class="badge bg-danger">Danger</span>
                        <span class="badge bg-warning">Warning</span>
                        <span class="badge bg-info">Info</span>
                        <span class="badge bg-dark">Dark</span>
                      </div>
                    </div>
                    <hr class="m-0" />
                    <div class="card-body">
                      <div class="text-light small fw-semibold">Pills</div>

                      <div class="demo-inline-spacing">
                        <span class="badge rounded-pill bg-primary">Primary</span>
                        <span class="badge rounded-pill bg-secondary">Secondary</span>
                        <span class="badge rounded-pill bg-success">Success</span>
                        <span class="badge rounded-pill bg-danger">Danger</span>
                        <span class="badge rounded-pill bg-warning">Warning</span>
                        <span class="badge rounded-pill bg-info">Info</span>
                        <span class="badge rounded-pill bg-dark">Dark</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Label Badges -->
                <div class="col-lg">
                  <div class="card mb-4">
                    <h5 class="card-header">Label Badges</h5>
                    <div class="card-body">
                      <div class="text-light small fw-semibold">Label Default</div>

                      <div class="demo-inline-spacing">
                        <span class="badge bg-label-primary">Primary</span>
                        <span class="badge bg-label-secondary">Secondary</span>
                        <span class="badge bg-label-success">Success</span>
                        <span class="badge bg-label-danger">Danger</span>
                        <span class="badge bg-label-warning">Warning</span>
                        <span class="badge bg-label-info">Info</span>
                        <span class="badge bg-label-dark">Dark</span>
                      </div>
                    </div>
                    <hr class="m-0" />
                    <div class="card-body">
                      <div class="text-light small fw-semibold">Label Pills</div>

                      <div class="demo-inline-spacing">
                        <span class="badge rounded-pill bg-label-primary">Primary</span>
                        <span class="badge rounded-pill bg-label-secondary">Secondary</span>
                        <span class="badge rounded-pill bg-label-success">Success</span>
                        <span class="badge rounded-pill bg-label-danger">Danger</span>
                        <span class="badge rounded-pill bg-label-warning">Warning</span>
                        <span class="badge rounded-pill bg-label-info">Info</span>
                        <span class="badge rounded-pill bg-label-dark">Dark</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Button with Badges -->
                <div class="col-lg">
                  <div class="card mb-4">
                    <h5 class="card-header">Button with Badges</h5>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-sm-4">
                          <small class="text-light fw-semibold">Default</small>
                          <div class="demo-inline-spacing">
                            <button type="button" class="btn btn-primary">
                              Text
                              <span class="badge bg-white text-primary">4</span>
                            </button>
                            <button type="button" class="btn btn-primary">
                              Text
                              <span class="badge bg-secondary rounded-pill">4</span>
                            </button>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <small class="text-light fw-semibold">Label</small>
                          <div class="demo-inline-spacing">
                            <button type="button" class="btn btn-outline-primary">
                              Text
                              <span class="badge bg-white text-primary">4</span>
                            </button>
                            <button type="button" class="btn btn-outline-primary">
                              Text
                              <span class="badge bg-secondary rounded-pill">4</span>
                            </button>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <small class="text-light fw-semibold">Outline</small>
                          <div class="demo-inline-spacing">
                            <button type="button" class="btn btn-outline-primary">
                              Text
                              <span class="badge">4</span>
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                              Text
                              <span class="badge rounded-pill">4</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Badge Circle -->
                <div class="col-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Badge Circle & Square Style</h5>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-xl-6">
                          <h6>Basic</h6>
                          <div class="text-light small fw-semibold mb-2">Default</div>
                          <div class="demo-inline-spacing">
                            <p>
                              <span class="badge badge-center rounded-pill bg-primary">1</span>
                              <span class="badge badge-center rounded-pill bg-secondary">2</span>
                              <span class="badge badge-center rounded-pill bg-success">3</span>
                              <span class="badge badge-center rounded-pill bg-danger">4</span>
                              <span class="badge badge-center rounded-pill bg-warning">5</span>
                              <span class="badge badge-center rounded-pill bg-info">6</span>
                            </p>
                            <p>
                              <span class="badge badge-center bg-primary">1</span>
                              <span class="badge badge-center bg-secondary">2</span>
                              <span class="badge badge-center bg-success">3</span>
                              <span class="badge badge-center bg-danger">4</span>
                              <span class="badge badge-center bg-warning">5</span>
                              <span class="badge badge-center bg-info">6</span>
                            </p>
                          </div>
                        </div>
                        <div class="col-xl-6">
                          <h6>Label</h6>
                          <div class="text-light small fw-semibold mb-2">Default</div>
                          <div class="demo-inline-spacing">
                            <p>
                              <span class="badge badge-center rounded-pill bg-label-primary">1</span>
                              <span class="badge badge-center rounded-pill bg-label-secondary">2</span>
                              <span class="badge badge-center rounded-pill bg-label-success">3</span>
                              <span class="badge badge-center rounded-pill bg-label-danger">4</span>
                              <span class="badge badge-center rounded-pill bg-label-warning">5</span>
                              <span class="badge badge-center rounded-pill bg-label-info">6</span>
                            </p>
                            <p>
                              <span class="badge badge-center bg-label-primary">1</span>
                              <span class="badge badge-center bg-label-secondary">2</span>
                              <span class="badge badge-center bg-label-success">3</span>
                              <span class="badge badge-center bg-label-danger">4</span>
                              <span class="badge badge-center bg-label-warning">5</span>
                              <span class="badge badge-center bg-label-info">6</span>
                            </p>
                          </div>
                        </div>
                      </div>
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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
