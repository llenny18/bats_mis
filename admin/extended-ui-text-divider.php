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

    <title>Text Divider - Extended UI | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Extended UI /</span> Text Divider</h4>

              <div class="row">
                <!-- Basic -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <h5 class="card-header">Basic</h5>
                    <div class="card-body">
                      <div class="divider">
                        <div class="divider-text">Text</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Basic -->

                <!-- Text Alignment -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <h5 class="card-header">Alignment</h5>
                    <div class="card-body">
                      <div class="divider text-start">
                        <div class="divider-text">Start</div>
                      </div>
                      <div class="divider text-start-center">
                        <div class="divider-text">Start-Center</div>
                      </div>
                      <div class="divider">
                        <div class="divider-text">Center (Default)</div>
                      </div>
                      <div class="divider text-end-center">
                        <div class="divider-text">End-Center</div>
                      </div>
                      <div class="divider text-end">
                        <div class="divider-text">End</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Text Alignment -->

                <!-- Divider Colors -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <h5 class="card-header">Colors</h5>
                    <div class="card-body">
                      <div class="divider divider-primary">
                        <div class="divider-text">Primary</div>
                      </div>
                      <div class="divider divider-success">
                        <div class="divider-text">Success</div>
                      </div>
                      <div class="divider divider-danger">
                        <div class="divider-text">Danger</div>
                      </div>
                      <div class="divider divider-warning">
                        <div class="divider-text">Warning</div>
                      </div>
                      <div class="divider divider-info">
                        <div class="divider-text">Info</div>
                      </div>
                      <div class="divider divider-dark">
                        <div class="divider-text">Dark</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Divider Colors -->

                <!-- Icons -->
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <h5 class="card-header">Icons</h5>
                    <div class="card-body">
                      <div class="divider text-start">
                        <div class="divider-text">
                          <i class="bx bx-sun"></i>
                        </div>
                      </div>
                      <div class="divider text-start-center">
                        <div class="divider-text">
                          <i class="bx bx-crown"></i>
                        </div>
                      </div>
                      <div class="divider">
                        <div class="divider-text">
                          <i class="bx bx-star"></i>
                        </div>
                      </div>
                      <div class="divider text-end-center">
                        <div class="divider-text">
                          <i class="bx bx-coffee-togo"></i>
                        </div>
                      </div>
                      <div class="divider text-end">
                        <div class="divider-text">
                          <i class="bx bx-cut bx-rotate-180"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Icons -->

                <!-- Icons -->
                <div class="col-md-12">
                  <div class="card">
                    <h5 class="card-header">Styles</h5>
                    <div class="card-body">
                      <div class="divider">
                        <div class="divider-text">Solid (Default)</div>
                      </div>
                      <div class="divider divider-dotted">
                        <div class="divider-text">Dotted</div>
                      </div>
                      <div class="divider divider-dashed">
                        <div class="divider-text">Dashed</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Icons -->
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

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

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
