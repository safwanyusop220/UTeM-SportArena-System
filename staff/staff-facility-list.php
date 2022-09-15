<?php
//Database Connection
include "../sql/config.php";

include "../sql/secureStaff.php";
$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "staff"){
    header("location: ../sql/logout.php");
}


?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Facility List | UTeM SportArena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- App css -->
        <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />



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
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                    <h2 class="page-title text-center mb-3 mt-3" style="color:black; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">PUSAT SUKAN SPORT FACILITY</h2>
                                <div class="row">
                                    <?php
                                         //Query
                                        $sql = "SELECT * FROM facility ORDER BY sportName ASC";
                                        $result = mysqli_query( $conn, $sql);
                                        $resultCheck = mysqli_num_rows ($result);

                                        if ($resultCheck > 0){
                                            
                                            // Get Data
                                            while ($row = mysqli_fetch_assoc($result)){

                                                // Get Data
                                                //Declaration
                                                $sportName = $row["sportName"];
                                                $sportVenue = $row["sportVenue"];
                                                $sportTimeStart = $row["sportTimeStart"];
                                                $sportTimeEnd = $row["sportTimeEnd"];
                                                $sportImage = $row["sportImage"];
                                                $TotalFacility = $row["totalFacility"];
                                                $id = $row["id"];

                                        ?>
                                        <div class="col-lg-6 ">
                                            <div class="card bg-secondary text-white rounded">
                                                <div class="row g-0 align-items-center" style="color:black; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                    <div class="col-md-4">
                                                        <img src="<?=$sportImage ?>" class="card-img" style="width: 210px; padding:20px;"  alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body bg-secondary text-white">
                                                            <h2 class="card-title"><?=$sportName?></h2>
                                                            <ul class=" list-group list-group-flush text-white">
                                                                <li class="bg-secondary list-group-item text-white"><b>Sport Facility : </b> <?=$sportVenue?> </li>
                                                                <li class="bg-secondary list-group-item text-white"><b>Time Start : </b><?=$sportTimeStart ?><b> hours</b></li>
                                                                <li class="bg-secondary list-group-item text-white"><b>Time End : </b><?=$sportTimeEnd ?><b> hours</b></li>
                                                                <li class="bg-secondary list-group-item text-white"><b>Total Court/ Facility : </b><?=$TotalFacility ?><b> Totals</b></li>
                                                            </ul>
                                                            <div class="card-footer bg-secondary text-center text-white">
                                                                <input type="hidden" value="<?=$id?>" name="id">
                                                                <!-- <button class="btn btn-warning" onClick="window.location='facility-edit.php'">
                                                                    Edit Details
                                                                </button> -->
                                                                <?php
                                                                    echo "<a href='student-booking-calendar.php?id=" .$id. "' class='btn btn-info btn-sm '>View Booking</a>";
                                                                    echo "<a href='facility-edit.php?id=" .$id. "' class='btn btn-success btn-sm m-1'>Edit Details </a>";
                                                                ?>
                                                                <a href="staff-facility-delete.php?delete=<?= $id ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure Want to delete?')"> Delete</a>
                                                            </div>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end col -->
                                                </div> <!-- end row-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                                     <?php
                                            }
                                        }
                                        else{
                                            // If error
                                            echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-facility-list.php'</script>";
                                        }
                                    ?>
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
                            <div class="col-md-6" style="color: white;">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b></p>
                            </div>
                                <div class="col-6 text-end" style="color: white;">
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

        <!-- bundle -->
        <script src="../js/vendor.min.js"></script>
        <script src="../js/app.min.js"></script>
        
    </body>

</html>
