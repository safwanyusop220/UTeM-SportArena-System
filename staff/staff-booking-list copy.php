<?php
//Database Connection
include "../sql/config.php";

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

/* body{
    background-image:url(../img/dewan-pusat-sukan.jpeg);
    background-repeat: no-repeat;
    background-size: 100%;
} */

</style>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    

                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="images/logo_sm.png" alt="" height="16">
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
                    <ul class="side-nav">

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
                                    <li>
                                        <a class="mdi mdi-clipboard-list-outline" href="staff-booking-list.php"> Booking List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Student</li>

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
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="../images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">Abdillah Safwan</span>
                                        <span class="account-position">Founder</span>
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
                                    <a href="../sql/logout.php" class="dropdown-item notify-item">
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
                                    </div>
                                    <h3 class="page-title"><b>UTeM Sport Arena Management</b></h3>
                                </div>


 

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Pending Booking</h4>
                                                <p class="text-muted font-14">
                                                    This example shows the DataTables table body scrolling in the vertical direction. This can generally be seen as an
                                                    alternative method to pagination for displaying a large table in a fairly small vertical area, and as such
                                                    pagination has been disabled here (note that this is not mandatory, it will work just fine with pagination enabled
                                                    as well!).
                                                </p>

                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="scroll-vertical-preview">
                                                        <table id="scroll-vertical-datatable" class="table dt-responsive nowrap">
                                                            <thead>
                                                                <tr>
                                                                <th style="font-size:13px; text-align:center;">Booking No.</th>
                                                                <th style="font-size:13px; text-align:center;">Booking By</th>
                                                                <th style="font-size:13px; text-align:center;">Booking Date</th>
                                                                <th style="font-size:13px; text-align:center;">Sport Name</th>
                                                                <th style="font-size:13px; text-align:center;">Venue</th>
                                                                <th style="font-size:13px; text-align:center;">Booking Status</th>
                                                                <th style="width: 225px; font-size:13px; text-align:center;">Action</th>
                                                                </tr>
                                                            </thead>   
                                                            <?php
                                                                //Query
                                                                $sql = "SELECT * FROM booking";
                                                                $result = mysqli_query( $conn, $sql);
                                                                $resultCheck = mysqli_num_rows ($result);

                                                                if ($resultCheck > 0){
                                                                    
                                                                    // Get Data
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                        // Get Data
                                                                        //Declaration
                                                                        $id = $row["id"];
                                                                        $bookingBy = $row["bookingBy"];
                                                                        $sportName = $row["sportName"];
                                                                        $sportVenue = $row["sportVenue"];
                                                                        $bookingDate = $row["dateTime"];
                                                                        $userMatricNum = $row["studMatric"];
                                                            ?>                    
                                                            <tbody>
                                                            <tr>
                                                                <td style="font-size:13px;"><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?=$id?></a> </td>
                                                                <td style="font-size:13px;"><?=$bookingBy?> <small class="text-muted">(<?=$userMatricNum?>)</small></td>
                                                                <td style="font-size:13px;"><?=$bookingDate?></td>
                                                                <td style="font-size:13px;"><?=$sportName?></td>
                                                                <td style="font-size:13px;"><?=$sportVenue?></td>
                                                                <td style="font-size:13px;"><h5><span class="badge badge-info-lighten">Confirmed</span></h5></td>
                                                                <td>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1" class="btn btn-info btn-sm"><i class="mdi mdi-text-box-search mdi-18px"></i> View</a>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1/edit" class="btn btn-primary btn-sm"><i class="mdi mdi-lead-pencil mdi-18px" style="color: white; icon-large"></i> Edit</a>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1/edit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-alert mdi-18px"></i> Delete</a>
                                                                    <div class="dropdown d-inline-block">
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            <?php      
                                                                    }          
                                                                }
                                                                else{
                                                                    // If error
                                                                    echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-dashboard.php'</script>";
                                                                }
                                                            ?>
                                                        </table>                     
                                                    </div> <!-- end preview-->
                                                </div> <!-- end tab-content-->

                                            </div> <!-- end card body-->
                                        </div> <!-- end card -->
                                    </div><!-- end col-->
                                </div>
                                <!-- end row-->

                                





                                






                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <h4 class="page-title pl-3">Booking List</h4>
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-xl-8">
                                                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                                            <div class="col-auto">
                                                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="d-flex align-items-center">
                                                                    <label for="status-select" class="me-2">Status</label>
                                                                    <select class="form-select" id="status-select">
                                                                        <option selected="">Choose...</option>
                                                                        <option value="1">Confirmed</option>
                                                                        <option value="2">Awaiting Authorization</option>
                                                                        <option value="3">Payment failed</option>
                                                                        <option value="4">Cash On Delivery</option>
                                                                        <option value="5">Fulfilled</option>
                                                                        <option value="6">Unfulfilled</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>                            
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="text-xl-end mt-xl-0 mt-2">
                                                            <button type="button" class="btn btn-danger mb-2 me-2"><i class="mdi mdi-basket me-1"></i>Add New Booking</button>
                                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                                        </div>
                                                    </div><!-- end col-->
                                                </div>
                        
                                                <div class="table-responsive">
                                                    <table class="table table-centered table-nowrap mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th style="font-size:13px; text-align:center;">Booking No.</th>
                                                                <th style="font-size:13px; text-align:center;">Booking By</th>
                                                                <th style="font-size:13px; text-align:center;">Booking Date</th>
                                                                <th style="font-size:13px; text-align:center;">Sport Name</th>
                                                                <th style="font-size:13px; text-align:center;">Venue</th>
                                                                <th style="font-size:13px; text-align:center;">Booking Status</th>
                                                                <th style="width: 225px; font-size:13px; text-align:center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                                //Query
                                                                $sql = "SELECT * FROM booking";
                                                                $result = mysqli_query( $conn, $sql);
                                                                $resultCheck = mysqli_num_rows ($result);

                                                                if ($resultCheck > 0){
                                                                    
                                                                    // Get Data
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                        // Get Data
                                                                        //Declaration
                                                                        $id = $row["id"];
                                                                        $bookingBy = $row["bookingBy"];
                                                                        $sportName = $row["sportName"];
                                                                        $sportVenue = $row["sportVenue"];
                                                                        $bookingDate = $row["dateTime"];
                                                                        $userMatricNum = $row["studMatric"];
                                                            ?>
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-size:13px;"><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?=$id?></a> </td>
                                                                <td style="font-size:13px;"><?=$bookingBy?> <small class="text-muted">(<?=$userMatricNum?>)</small></td>
                                                                <td style="font-size:13px;"><?=$bookingDate?></td>
                                                                <td style="font-size:13px;"><?=$sportName?></td>
                                                                <td style="font-size:13px;"><?=$sportVenue?></td>
                                                                <td style="font-size:13px;"><h5><span class="badge badge-info-lighten">Confirmed</span></h5></td>
                                                                <td>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1" class="btn btn-info btn-sm"><i class="mdi mdi-text-box-search mdi-18px"></i> View</a>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1/edit" class="btn btn-primary btn-sm"><i class="mdi mdi-lead-pencil mdi-18px" style="color: white; icon-large"></i> Edit</a>
                                                                    <a href="https://sms.smkal.my/admin/auth/user/1/edit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-alert mdi-18px"></i> Delete</a>
                                                                    <div class="dropdown d-inline-block">
                                                                    <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">More</a>
                                                                    <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                                        <a href="https://sms.smkal.my/admin/auth/user/1/password/change" class="dropdown-item">Change Password</a>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                            <?php      
                                                                    }          
                                                                }
                                                                else{
                                                                    // If error
                                                                    echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-dashboard.php'</script>";
                                                                }
                                                            ?>
                                                    </table>
                                                </div>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->
                                </div>


                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b><script>document.write(new Date().getFullYear())</script>© UTem - PSM 1</p>
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
