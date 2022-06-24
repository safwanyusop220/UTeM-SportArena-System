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
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        

        //trim
        $id             = trim( $_POST["bId"]);
        $bookingDate  = trim( $_POST["bookingDate"]);


        //Query
        $sql = "UPDATE booking SET `dateTime`=? WHERE id=?" ;
        $stmt = mysqli_prepare($conn, $sql);

        //Bind 
        mysqli_stmt_bind_param($stmt, "si", $bookingDate ,$id );

        //execute
        if (mysqli_stmt_execute ($stmt)){
            echo "<script>alert('Successfully update the booking date');window.location.href='student-booking-list.php'</script>";
        }
        else {
            echo "<script>alert('Sorry, your databse problem ');window.location.href='student-booking-list.php'</script>";
        }
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>





    </head>

    <style>
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
                <ul class="side-nav" style="background-color:#1d2832;">

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
                                    <a class="mdi mdi-office-building-marker" href="student-facility-list.php"> Facility List</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-progress-clock" href="student-booking-pending.php"> Pending Booking</a>
                                </li>
                                <li>
                                    <a class="mdi mdi-clipboard-list-outline" href="student-booking-history.php"> Booking History</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Info Semasa</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                            aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="dripicons-information"></i>
                            <span> Info </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="student-aluan.html">Kata Aluan Pengarah</a>
                                </li>
                                <li>
                                    <a href="student-vision-mission.html">Vision & Mission</a>
                                </li>
                                <li>
                                    <a href="student-objective.html">Objective</a>
                                </li>
                                <li>
                                    <a href="student-organization-chart.html">Organization Chart</a>
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
                                        <img src="../img/user-icon.jpeg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?=$userLogin?></span>
                                        <span class="account-position">Student Access</span>
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
                            <i class="mdi mdi-menu"></i>
                        </button>

                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                    <div class="row">
                        <div class="col-12">
                                                    
                        </div>

                            <div class="col-8 mx-auto">
                                <div class="card mt-3">

                                    <div class="card-header" style="text-align: center; font-size:25px; color:black; background-color:#C0C0C0; ">Update Date Booking</div>
                                    <div class="card-header-actions"> <a href="student-booking-pending.php" class="card-header-action btn btn-success btn-sm m-2 mdi mdi-arrow-left-bold-outline " style="color: white; icon-large">Back</a></div>
                                
                            
                                    <div class="card-body">
                                            <!-----------------------FORM ----------------------->
                                            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                                    <input type="hidden" id="bId"  name="bId" value="<?= $id?>">

                                    <div class="row g-2">
                                        <div class="mb-3 col-md-6">
                                            <label for="bookingBy" class="form-label">Student Name</label>
                                            <input type="text" class="form-control" id="bookingBy" value="<?= $bookingBy?>" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="studMatric" class="form-label">Student Matric Number</label>
                                            <input type="text" class="form-control" id="studMatric"  value="<?= $userMatricNum?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="mb-3 col-md-6">
                                            <label for="sportName" class="form-label">Sport Name</label>
                                            <input type="text" class="form-control" id="sportName" value="<?= $sportName?>" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="sportVenue" class="form-label">Sport venue</label>
                                            <input type="text" class="form-control" id="sportVenue"  value="<?= $sportVenue?>" readonly>
                                        </div>
                                    </div>

                                        <label for="bookingDate" class="col offset-5" style="text-align: center;">Date</label>
                                        <div class="input-group date"  data-provide="datepicker"> 
                                        <div class="col-md-2 offset-5 " >
                                            <input type="text" id="bookingDate" name="bookingDate" value="<?= $bookingDate?>" class="form-control">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer" style="text-align: center;">
                                    <button class="btn btn-sm btn-primary " type="submit">Update</button>
                                </div><!--card-footer-->
                                
                                    </form>  
              
                                </div><!--card-body-->
                            

                            </div><!--card-->
                        </form>
                        
                    </div>
                </div>



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
                                    Copyright <script>document.write(new Date().getFullYear())</script> © UTem - PSM 1
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


                <!-- datepicker -->
                <script type="text/javascript">
                    $(function(){
                        $('.datepicker').datepicker({
                            format: 'yyyy-mm-dd',
                        });
                        
                    });
                </script>
                       
                        
    </body>
</html>
