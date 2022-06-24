<?php
include "../sql/config.php";

//Declaration
$sportName = "";
$sportVenue = "";
$sportTimeStart = "";
$sportTimeEnd = "";
$sportImage = "";

$ImageStatus = "False";


$bookingBy = "";


if (isset($_GET["id"])) {

    // Declaration
    $id = $_GET["id"];

    // Get Data
    $sql = "select * from facility where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sportName = $row["sportName"];
    $sportVenue = $row["sportVenue"];
    $sportImage = $row["sportImage"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //trim
    $id = trim($_POST["id"]);
    $sportName = trim($_POST["sportName"]);
    $sportVenue = trim($_POST["sportVenue"]);
    $bookingBy = trim($_POST["bookingBy"]);
    $bookingDate = trim($_POST["bookingDate"]);
    $bookingTime = trim($_POST["bookingTime"]);

    //Query
    $sql = "INSERT INTO booking (bookingBy, sportName, sportVenue, bookingDate, bookingTime) VALUE (?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    //Bind 
    mysqli_stmt_bind_param($stmt, "sssss", $bookingBy, $sportName, $sportVenue, $bookingDate, $bookingTime);

    //execute
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Successfully made the booking');window.location.href='student-facility-list.php'</script>";
    }
    else {
        echo "<script>alert('Sorry, your databse problem ');window.location.href='student-facility-list.php'</script>";
    }
}



function checkSlots($mysqli, $date){

    $stmt = $mysqli ->prepare('SELECT * From booking where date =?');
    $stmt->bind_param('s',$date);
    $totalbookings = 0;
    $booking = array();
        if($stmt -> execute()){
            $result=$stmt->get_result();
            if($result->num_rows > 0 ){
                while($row = $result->fetch_assoc()){
                    $totalbookings++;
                }
                $stmt->close();
            }
        }
        return $totalbookings;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Starter Page | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Datatables css -->
    <link href="../css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
            <style>

            .li{
                list-style: none;
            }

            @media only screen and (max-width: 760px),
            (min-device-width: 802px) and (max-device-width: 1020px) {
                table,
                thead,
                tbody,
                th,
                td,
                tr{
                    display: block;
                }
                .empty{
                    display: none;
                }
            }

            .row{
                margin-top: 20px;
            }

            .today{
               background: red;
            }

            table{
                table-layout: fixed;
                background: #ededed;
                border-collapse:separate;
                border-top-left-radius: 1em;
                border-top-right-radius: 1em;
                border:solid black 5px;
                box-shadow: 5px 5px 40px #a7a7a7;
            
                
            }


            td{
               width: 53%; 
            }


            </style>

</head>



<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">


            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="../images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="../images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                            aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Home </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                                <li>
                                    <a href="student-facility-list.php">Facility List</a>
                                </li>
                                <li>
                                    <a href="student-booking-list.php">Booking List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">About Us</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                            aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span> Email </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="side-nav-second-level">
                                <li>
                              <a href="#">Pusat Sukan UTeM</a>
                              </li>
                                <li>
                                 <a href="#">Inquiry</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- Help Box -->
                <div class="help-box text-white text-center">
                    <h5 class="mt-3">UTeM Sport Arena</h5>
                    <p class="mb-3">Version 1.0</p>
                </div>
                <!-- end Help Box -->
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="../images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">Abdillah Safwan</span>
                                    <span class="account-position">Founder</span>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lifebuoy me-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->

                                <!-- Start Content-->
                                <div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>
            </div>
            <h4 class="page-title">Calendar</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="d-grid">
                            <button class="btn btn-lg font-16 btn-danger" id="btn-new-event"><i
                                    class="mdi mdi-plus-circle-outline"></i> Create New
                                Event</button>
                        </div>
                        <div id="external-events" class="m-t-20">
                            <br>
                            <p class="text-muted">Drag and drop your event or click in the calendar
                            </p>
                            <div class="external-event bg-success-lighten text-success"
                                data-class="bg-success">
                                <i
                                    class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New
                                Theme Release
                            </div>
                            <div class="external-event bg-info-lighten text-info"
                                data-class="bg-info">
                                <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My
                                Event
                            </div>
                            <div class="external-event bg-warning-lighten text-warning"
                                data-class="bg-warning">
                                <i
                                    class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet
                                manager
                            </div>
                            <div class="external-event bg-danger-lighten text-danger"
                                data-class="bg-danger">
                                <i
                                    class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create
                                New theme
                            </div>
                        </div>


                        <div class="mt-5 d-none d-xl-block">
                            <h5 class="text-center">How It Works ?</h5>

                            <ul class="ps-3">
                                <li class="text-muted mb-3">
                                    It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged.
                                </li>
                                <li class="text-muted mb-3">
                                    Richard McClintock, a Latin professor at Hampden-Sydney College
                                    in Virginia, looked up one of the more obscure Latin words,
                                    consectetur, from a Lorem Ipsum passage.
                                </li>
                                <li class="text-muted mb-3">
                                    It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged.
                                </li>
                            </ul>
                        </div>

                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="mt-4 mt-lg-0">
                            <div id="calendar"></div>
                        </div>
                    </div> <!-- end col -->

                </div> <!-- end row -->
            </div> <!-- end card body-->
        </div> <!-- end card -->

        <!-- Add New Event MODAL -->
        <div class="modal fade" id="event-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                        <div class="modal-header py-3 px-4 border-bottom-0">
                            <h5 class="modal-title" id="modal-title">Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-4 pb-4 pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="control-label form-label">Event Name</label>
                                        <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="control-label form-label">Category</label>
                                        <select class="form-select" name="category" id="event-category" required>
                                            <option value="bg-danger" selected>Danger</option>
                                            <option value="bg-success">Success</option>
                                            <option value="bg-primary">Primary</option>
                                            <option value="bg-info">Info</option>
                                            <option value="bg-dark">Dark</option>
                                            <option value="bg-warning">Warning</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid event category</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </div>
        <!-- end modal-->
    </div>
    <!-- end col-12 -->
</div> <!-- end row -->

</div> <!-- container -->


                        <!-- Footer Start -->
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <script>document.write(new Date().getFullYear())</script> 2022 © UTem - PSM 1
                                        2022
                                    </div>
                                </div>
                            </div>
                    </div>
                    </footer>
                    <!-- end Footer -->

</div>

                </div>

                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->


            </div>
            <!-- END wrapper -->


            <!-- Right Sidebar -->
            <div class="end-bar">

                <div class="rightbar-title">
                    <a href="javascript:void(0);" class="end-bar-toggle float-end">
                        <i class="dripicons-cross noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <div class="rightbar-content h-100" data-simplebar>

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <!-- Settings -->
                        <h5 class="mt-3">Color Scheme</h5>
                        <hr class="mt-1" />

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                                id="light-mode-check" checked>
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                                id="dark-mode-check">
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>


                        <!-- Width -->
                        <h5 class="mt-4">Width</h5>
                        <hr class="mt-1" />
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check"
                                checked>
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>


                        <!-- Left Sidebar-->
                        <h5 class="mt-4">Left Sidebar</h5>
                        <hr class="mt-1" />
                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="default"
                                id="default-check">
                            <label class="form-check-label" for="default-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check"
                                checked>
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="fixed"
                                id="fixed-check" checked>
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                                id="condensed-check">
                            <label class="form-check-label" for="condensed-check">Condensed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input class="form-check-input" type="checkbox" name="compact" value="scrollable"
                                id="scrollable-check">
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                            <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                                class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase
                                Now</a>
                        </div>
                    </div> <!-- end padding-->

                </div>
            </div>

            <div class="rightbar-overlay"></div>
            <!-- /End-bar -->


            <!-- bundle -->
            <script src="../js/vendor.min.js"></script>
            <script src="../js/app.min.js"></script>
            <script>
                function preview() {
                    frame.src = URL.createObjectURL(event.target.files[0]);
                    document.getElementById( "ImageStatus" ).value = "TRUE";
                }

                function clearImage() {
                    document.getElementById('fileToUpload').value = null;
                    frame.src = "";
                }
            </script>
                <script type="text/javascript">
                    $(function() {
                        $('#datepicker').datepicker();
                    });
                </script>

            <!-- datePicker -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="../js/vendor/fullcalendar.min.js"></script>
    <script src="../js/pages/demo.calendar.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/fullcalendar.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.calendar.js"></script>


</body>
</html>