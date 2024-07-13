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

    <title>OffCanvas - UI elements | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Offcanvas</h4>

              <div class="card mb-4">
                <h5 class="card-header">Placements</h5>
                <div class="card-body">
                  <div class="row gy-3">
                    <!-- Default Offcanvas -->
                    <div class="col-lg-3 col-md-6">
                      <small class="text-light fw-semibold mb-3">Start (Default)</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasStart"
                          aria-controls="offcanvasStart"
                        >
                          Toggle Start
                        </button>
                        <div
                          class="offcanvas offcanvas-start"
                          tabindex="-1"
                          id="offcanvasStart"
                          aria-labelledby="offcanvasStartLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasStartLabel" class="offcanvas-title">Offcanvas Start</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <p class="text-center">
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-outline-secondary d-grid w-100"
                              data-bs-dismiss="offcanvas"
                            >
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- End Offcanvas -->
                    <div class="col-lg-3 col-md-6">
                      <small class="text-light fw-semibold mb-3">End</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEnd"
                          aria-controls="offcanvasEnd"
                        >
                          Toggle End
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Offcanvas End</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <p class="text-center">
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-outline-secondary d-grid w-100"
                              data-bs-dismiss="offcanvas"
                            >
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Top Offcanvas -->
                    <div class="col-lg-3 col-md-6">
                      <small class="text-light fw-semibold mb-3">Top</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasTop"
                          aria-controls="offcanvasTop"
                        >
                          Toggle Top
                        </button>
                        <div
                          class="offcanvas offcanvas-top"
                          tabindex="-1"
                          id="offcanvasTop"
                          aria-labelledby="offcanvasTopLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasTopLabel" class="offcanvas-title">Offcanvas Top</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body">
                            <p>
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary me-2">Continue</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Bottom Offcanvas -->
                    <div class="col-lg-3 col-md-6">
                      <small class="text-light fw-semibold mb-3">Bottom</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasBottom"
                          aria-controls="offcanvasBottom"
                        >
                          Toggle Bottom
                        </button>
                        <div
                          class="offcanvas offcanvas-bottom"
                          tabindex="-1"
                          id="offcanvasBottom"
                          aria-labelledby="offcanvasBottomLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasBottomLabel" class="offcanvas-title">Offcanvas Bottom</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body">
                            <p>
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary me-2">Continue</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <h5 class="card-header">Backdrop</h5>
                <div class="card-body">
                  <div class="row gy-3">
                    <!-- Enable Body Scrolling Offcanvas -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold mb-3">Enable Body Scrolling</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasScroll"
                          aria-controls="offcanvasScroll"
                        >
                          Enable Body Scrolling
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          data-bs-scroll="true"
                          data-bs-backdrop="false"
                          tabindex="-1"
                          id="offcanvasScroll"
                          aria-labelledby="offcanvasScrollLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasScrollLabel" class="offcanvas-title">Offcanvas Scroll</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <p class="text-center">
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-outline-secondary d-grid w-100"
                              data-bs-dismiss="offcanvas"
                            >
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Enable backdrop (default) Offcanvas -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold mb-3">Enable backdrop (default)</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasBackdrop"
                          aria-controls="offcanvasBackdrop"
                        >
                          Enable backdrop
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasBackdrop"
                          aria-labelledby="offcanvasBackdropLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Enable backdrop</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <p class="text-center">
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-outline-secondary d-grid w-100"
                              data-bs-dismiss="offcanvas"
                            >
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Enable Scrolling & Backdrop Offcanvas -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold mb-3">Enable Scrolling & Backdrop</small>
                      <div class="mt-3">
                        <button
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasBoth"
                          aria-controls="offcanvasBoth"
                        >
                          Enable both scrolling & backdrop
                        </button>
                        <div
                          class="offcanvas offcanvas-end"
                          data-bs-scroll="true"
                          tabindex="-1"
                          id="offcanvasBoth"
                          aria-labelledby="offcanvasBothLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasBothLabel" class="offcanvas-title">Enable both scrolling & backdrop</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <p class="text-center">
                              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                              graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                              century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                              for use in a type specimen book.
                            </p>
                            <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                            <button
                              type="button"
                              class="btn btn-outline-secondary d-grid w-100"
                              data-bs-dismiss="offcanvas"
                            >
                              Cancel
                            </button>
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
