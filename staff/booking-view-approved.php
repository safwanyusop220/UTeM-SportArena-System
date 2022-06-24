<?php
//Database Connection
include "../sql/config.php";
include "../sql/secureStaff.php";
$userLogin = $_SESSION['userUniqeName'];


    //Declaration
    $id = "";
    $sportName = "";
    $sportVenue = "";
    $bookingBy = "";


    if (isset($_GET["id"])){

        // Declaration
        $id = $_GET["id"];

        // Get Data
        $sql = "select * from booking where id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $id = $row["id"];
        $bookingBy = $row["bookingBy"];
        $studId = $row["studId"];
        $sportName = $row["sportName"];
        $sportVenue = $row["sportVenue"];
        $bookingDate = $row["dateTime"];
        $userMatricNum = $row["studMatric"];


    }

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Starter Page | UTeM SportArena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- App css -->
        <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <!-- third party css -->
        <link href="../css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->




    </head>

    <style>
        .container2 {
        position: relative;
        width: 50%;

        margin-bottom: 25px;
        margin-top: 25px;
        }

        .image2 {
        opacity: 1;
        display: block;
        width: 100%;
        box-shadow: 5px 5px 5px 5px #888888;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
        }

        .middle2 {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%)
        }

        .container2:hover .image2 {
        opacity: 0.3;
        }

        .container2:hover .middle2 {
        opacity: 1;
        }

        .text2 {
        background-color: #3CB371;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
        }

    body{
                background-color: #F0F8FF;
                background-repeat: no-repeat;
                background-size: 100%;
            } 

    footer{
                background-color: rgb(29, 40, 50);
                background-repeat: no-repeat;
                background-size: 100%;
            } 
    </style>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu" style="background-color:#1d2832;">
    


                <a href="../index.html" class="logo text-center logo-light">
                    <span class="logo-lg" style="background-color:#1d2832;">
                        <img src="../images/logo_utem.png" alt="" width="230" height="54">
                    </span>
                    <span class="logo-sm" style="background-color:#1d2832;">
                        <img src="../images/logo_utem_sm.png" alt="" height="52">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav" style="background-color:#1d2832;">

                    <li class="side-nav-title side-nav-item">Facility</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarFacility" aria-expanded="false" aria-controls="sidebarFacility" class="side-nav-link">
                            <i class="mdi mdi-office-building"></i>
                            <span> Facility Management </span>
                        </a>
                        <div class="collapse" id="sidebarFacility">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="staff-dashboard.php"> Dashboards</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-office-building-marker" href="staff-facility-list.php"> Facilites List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-office-building-outline" href="staff-add-facility.php"> Add Facilites</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Booking</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarBooking" aria-expanded="false" aria-controls="sidebarBooking" class="side-nav-link">
                            <i class="mdi mdi-list-status"></i>
                            <span> Booking Management </span>
                        </a>
                        <div class="collapse" id="sidebarBooking">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="#"> Dashboards</a>

                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="booking-list-pending.php"> Pending Booking List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-check-outline" href="booking-list-approved.php"> Approved Booking List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="booking-list-reject.php"> Rejected Booking List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Student</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarStudent" aria-expanded="false" aria-controls="sidebarStudent" class="side-nav-link">
                            <i class="mdi mdi-account-tie"></i>
                            <span> Student Management </span>
                        </a>
                        <div class="collapse" id="sidebarStudent">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a class="mdi mdi-view-dashboard-variant-outline" href="#"> Dashboards</a>

                                </li>
                                <li>
                                    <a class="mdi mdi-account-check-outline" href="student-pending-account.php"> Pending Account</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-cancel-outline" href="account-student-status-list.php">Account Status List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-account-multiple-check-outline" href="staff-registered-student.php"> Registered Student</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">About Us</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
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
                    <div class="navbar-custom" style="background-color: #1d2832;">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" style="background-color:#6c757d; border:none;" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar" > 
                                        <img src="../img/user-icon.jpeg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name" style="color:white; font-weight:bold; font-family:'Roboto'"><?= $userLogin?></span>
                                        <span class="account-position" style="color:white;">Staff Access</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
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
                                    <a href="../sql/logout.php" onclick="return confirm('Are you sure to logout?')" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu" style="color:#6c757d; "></i>
                        </button>

                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-8">
                                                    
                        </div>
                            <div class="col-8 mx-auto">
                                <div class="card mt-3">

                                    <div class="card-header" style="text-align: center; font-size:25px; color:black; background-color:#C0C0C0; ">View Booking</div>
                                    <div class="card-header-actions"> <a href="booking-list-approved.php" class="card-header-action btn btn-success btn-sm m-2 mdi mdi-arrow-left-bold-outline " style="color: white; icon-large">Back</a></div>
                                
                        <div class="card-body">
                        <table class="table table-hover" >
                            <tbody>
                            <?php
                                //Query
                                $sql = "SELECT * FROM booking WHERE id ='$id'";
                                $result = mysqli_query( $conn, $sql);
                                $resultCheck = mysqli_num_rows ($result);

                                if ($resultCheck > 0){
                                    
                                    // Get Data
                                    while ($row = mysqli_fetch_assoc($result)){

                                        // Get Data
                                        //Declaration
                                        $id = $row["id"];
                                        $facility_id = $row["facility_id"];
                                        $bookingBy = $row["bookingBy"];
                                        $studId = $row["studId"];
                                        $sportName = $row["sportName"];
                                        $sportVenue = $row["sportVenue"];
                                        $bookingDate = $row["dateTime"];
                                        $userMatricNum = $row["studMatric"];
                                        $status = $row["status"];

                                                                        //Query
                                $sql = "SELECT * FROM facility WHERE id ='$facility_id '";
                                $result = mysqli_query( $conn, $sql);
                                $resultCheck = mysqli_num_rows ($result);

                                if ($resultCheck > 0){
                                    
                                    // Get Data
                                    while ($row = mysqli_fetch_assoc($result)){

                                        // Get Data
                                        //Declaration
                                        $id = $row["id"];
                                        $sportImage = $row["sportImage"];
                                        $totalFacility = $row["totalFacility"];
                                    }          
                                }
                                else{
                                    // If error
                                    echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-booking-list.php'</script>";
    
                                }
                            ?>
                            <tr>
                                <th>Facility</th>

                                <td style="padding: 0px 90px; ">

                                    <div  class="container2" >
                                        <img src="<?=$sportImage ?>" alt="Avatar" class="center image2" style="border-radius: 15px; width:175% ">
                                        <div class="middle2">
                                            <div class="text2" style="text-align:center; width:200% ">Total Facility: <?=$totalFacility ?></div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            
                            
                            <tr>
                                <th>Booking By</th>
                                <td style="padding:15px 105px; "><?=$bookingBy?></td>
                            </tr>

                            <tr>
                                <th>Matric Number</th>
                                <td style="padding:15px 105px;"><?=$userMatricNum?></td>
                            </tr>

                            <tr>
                                <th>Sport Name</th>
                                <td style="padding:15px 105px;"><?=$sportName?></td>
                            </tr>

                            <tr>
                                <th>Sport Venue</th>
                                <td style="padding:15px 105px;"><?=$sportVenue?></td>
                            </tr>

                            <tr>
                                <th>Booking Id</th>
                                <td style="padding:15px 105px;"><?=$id?></td>
                            </tr>

                            <tr>
                                <th>Booking Date</th>
                                <td style="padding:15px 105px;"><?=$bookingDate?></td>
                            </tr>
                            
                            <tr>
                                <th>Booking Status</th>
                                <td style="padding:15px 105px;"><?=$status?></td>
                            </tr>
                        </tbody>
                        <?php      
                                }          
                            }
                            else{
                                // If error
                                echo "<script>alert('Sorry, there are no data exist');window.location.href='booking-list-approved.php'</script>";

                            }
                        ?>
                    </table>
                    <div class="card-footer" style="text-align: center; font-size:25px; color:black; background-color:#C0C0C0; ">.</div>
                    </div><!--card-body-->

                </div><!--card-->
                </div>

                    </div> <!-- End container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row" style="color:white;">
                            <div class="col-md-6">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b></p>
                            </div>
                                <div class="col-6 text-end">
                                    <script>document.write(new Date().getFullYear())</script>© UTem - PSM 1
                                </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

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
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
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
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


                <!-- bundle -->
                <script src="../js/vendor.min.js"></script>
                <script src="../js/app.min.js"></script>

                <script src="../js/vendor/jquery.dataTables.min.js"></script>
                <script src="../js/vendor/dataTables.bootstrap5.js"></script>
                <script src="../js/vendor/dataTables.responsive.min.js"></script>
                <script src="../js/vendor/responsive.bootstrap5.min.js"></script>
                <script src="../js/vendor/dataTables.buttons.min.js"></script>
                <script src="../js/vendor/buttons.bootstrap5.min.js"></script>
                <script src="../js/vendor/buttons.html5.min.js"></script>
                <script src="../js/vendor/buttons.flash.min.js"></script>
                <script src="../js/vendor/buttons.print.min.js"></script>
                <script src="../js/vendor/dataTables.keyTable.min.js"></script>
                <script src="../js/vendor/dataTables.select.min.js"></script>
                <!-- third party js ends -->


                <!-- demo app -->
                <script src="../js/pages/demo.datatable-init.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Nov 2021 13:43:16 GMT -->
</html>
