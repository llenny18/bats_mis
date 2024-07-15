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

    <title>BATS MIS | Calendar</title>

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


    <link rel="stylesheet" href="../calendar/dist/calendar.js.css">
        <script src="../calendar/dist/calendar.js"></script>
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

            <div class="container-fluid flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <div class="layout-demo-wrapper">
                <div id="myCalendar" style="max-width: 1500px; ">
                <p>Some data that should be cleared.</p>
            </div>
            <br>
    
     
            <h2>Import Events:</h2>
            <button onclick="importEvents();" class="btn btn-primary m-1">Import</button>

            <h2>Export Events:</h2>
            <button onclick="calendarInstance.export( 'csv' );" class="btn btn-primary m-1">Export (csv)</button>
            <button onclick="calendarInstance.export( 'xml' );" class="btn btn-primary m-1">Export (xml)</button>
            <button onclick="calendarInstance.export( 'json' );" class="btn btn-primary m-1">Export (json)</button>
            <button onclick="calendarInstance.export( 'text' );" class="btn btn-primary m-1">Export (text)</button>
            <button onclick="calendarInstance.export( 'ical' );" class="btn btn-primary m-1">Export (ical)</button>
            <button onclick="calendarInstance.export( 'md' );" class="btn btn-primary m-1">Export (md)</button>
            <button onclick="calendarInstance.export( 'html' );" class="btn btn-primary m-1">Export (html)</button>
            <button onclick="calendarInstance.export( 'tsv' );" class="btn btn-primary m-1">Export (tsv)</button>
                </div>
                
              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php   include("./footer.php");  ?>
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

   
    <script>
        var calendarInstance = new calendarJs( "myCalendar", { 
            exportEventsEnabled: true, 
            manualEditingEnabled: true, 
            views: {
                fullMonth: {
                    showTimesInEvents: false,
                    minimumDayHeight: 0
                }
            },
            manualEditingEnabled: true,
            organizerName: "Your Name",
            organizerEmailAddress: "your@email.address",
            visibleDays: [ 0, 1, 2, 3, 4, 5, 6 ],
            events: {
                onEventsExported: function( events ) {
                    console.log( events );
                }
            }
        } );


        var event1 = {
                from: new Date("2024-07-11"),
                to: new Date("2024-07-12"),
                title: "New Event 1",
                description: "A description of the new event"
            },
            event2 = {
                from: new Date(),
                to: new Date(),
                title: "New Event 2",
                description: "A description of the new event"
            };

            calendarInstance.addEvent( event1 );

        document.title += " v" + calendarInstance.getVersion();
        document.getElementById( "header" ).innerText += " - v" + calendarInstance.getVersion();

        function importEvents() {
            var input = document.createElement( "input" );
            input.type = "file";
            input.accept = ".ical, .ics, .json";
            input.multiple = "multiple";

            input.onchange = function() {
                calendarInstance.import( input.files );
            };

            input.click();
        }


       
    </script>
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
