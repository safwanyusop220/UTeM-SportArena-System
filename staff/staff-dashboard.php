<?php
//Database Connection
include "../sql/config.php";
include "../sql/secureStaff.php";

$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "staff"){
    header("location: ../sql/logout.php");
}

//Declaration
$jan = "";
$feb = "";
$march = "";
$april = "";
$may = "";
$june = "";
$july = "";
$august = "";
$september = "";
$october = "";
$november = "";
$december = "";

$archery="";

//Query
$sql = "SELECT * FROM facility";
$result = mysqli_query( $conn, $sql);
$resultCheck = mysqli_num_rows ($result);

$sql2 = "SELECT * FROM student";
$result2 = mysqli_query( $conn, $sql2);
$resultCheck2 = mysqli_num_rows ($result2);

$sql3 = "SELECT * FROM booking WHERE `status` = 'Approved'";
$result3 = mysqli_query( $conn, $sql3);
$approved = mysqli_num_rows ($result3);

$sql4 = "SELECT * FROM booking WHERE `status` = 'Pending'";
$result4 = mysqli_query( $conn, $sql4);
$Pending = mysqli_num_rows ($result4);

$grafJan = "SELECT * FROM booking WHERE `dateTime` LIKE '%-01-%'";
$janResult = mysqli_query( $conn, $grafJan);
$jan = mysqli_num_rows ($janResult);

$grafFeb = "SELECT * FROM booking WHERE `dateTime` LIKE '%-02-%'";
$FebResult = mysqli_query( $conn, $grafFeb);
$feb = mysqli_num_rows ($FebResult);

$grafMarch = "SELECT * FROM booking WHERE `dateTime` LIKE '%-03-%'";
$marchResult = mysqli_query( $conn, $grafMarch);
$march = mysqli_num_rows ($marchResult);

$grafApril = "SELECT * FROM booking WHERE `dateTime` LIKE '%-04-%'";
$aprilResult = mysqli_query( $conn, $grafApril);
$april = mysqli_num_rows ($aprilResult);

$grafMay = "SELECT * FROM booking WHERE `dateTime` LIKE '%-05-%'";
$mayResult = mysqli_query( $conn, $grafMay);
$may = mysqli_num_rows ($mayResult);

$grafJune = "SELECT * FROM booking WHERE `dateTime` LIKE '%-06-%'";
$juneResult = mysqli_query( $conn, $grafJune);
$june = mysqli_num_rows ($juneResult);

$grafJuly = "SELECT * FROM booking WHERE `dateTime` LIKE '%-07-%'";
$julyResult = mysqli_query( $conn, $grafJuly);
$july = mysqli_num_rows ($julyResult);

$grafAugust = "SELECT * FROM booking WHERE `dateTime` LIKE '%-08-%'";
$augustResult = mysqli_query( $conn, $grafAugust);
$august = mysqli_num_rows ($augustResult);

$grafSeptember = "SELECT * FROM booking WHERE `dateTime` LIKE '%-09-%'";
$septemberResult = mysqli_query( $conn, $grafSeptember);
$september = mysqli_num_rows ($septemberResult);

$grafOctober = "SELECT * FROM booking WHERE `dateTime` LIKE '%-10-%'";
$octoberResult = mysqli_query( $conn, $grafOctober);
$october = mysqli_num_rows ($octoberResult);

$grafNovember = "SELECT * FROM booking WHERE `dateTime` LIKE '%-11-%'";
$novemberResult = mysqli_query( $conn, $grafNovember);
$november = mysqli_num_rows ($novemberResult);

$grafDecember = "SELECT * FROM booking WHERE `dateTime` LIKE '%-12-%'";
$decemberResult = mysqli_query( $conn, $grafDecember);
$december = mysqli_num_rows ($decemberResult);

$archeryTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Arch%'";
$archeryResult = mysqli_query( $conn, $archeryTotal);
$archery = mysqli_num_rows ($archeryResult);

$badmintonTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Bad%'";
$badmintonResult = mysqli_query( $conn, $badmintonTotal);
$badminton = mysqli_num_rows ($badmintonResult);

$basketballTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Basket%'";
$basketballResult = mysqli_query( $conn, $basketballTotal);
$basketball = mysqli_num_rows ($basketballResult);

$cyclingTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Cycl%'";
$cyclingResult = mysqli_query( $conn, $cyclingTotal);
$cycling = mysqli_num_rows ($cyclingResult);

$futsalTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Futsal%'";
$futsalResult = mysqli_query( $conn, $futsalTotal);
$futsal = mysqli_num_rows ($futsalResult);

$HockeyTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Hockey%'";
$HockeyResult = mysqli_query( $conn, $HockeyTotal);
$Hockey = mysqli_num_rows ($HockeyResult);

$takrawTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Takraw%'";
$takrawResult = mysqli_query( $conn, $takrawTotal);
$takraw = mysqli_num_rows ($takrawResult);

$volleyTotal = "SELECT * FROM booking WHERE `sportName` LIKE '%Volley%'";
$volleyResult = mysqli_query( $conn, $volleyTotal);
$volley = mysqli_num_rows ($volleyResult);

$FKPTotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FKP%'";
$FKPResult = mysqli_query( $conn, $FKPTotal);
$FKP = mysqli_num_rows ($FKPResult);

$FTMKotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FTMK%'";
$FTMKResult = mysqli_query( $conn, $FTMKotal);
$FTMK = mysqli_num_rows ($FTMKResult);

$FKMTotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FKM%'";
$FKMResult = mysqli_query( $conn, $FKMTotal);
$FKM = mysqli_num_rows ($FKMResult);

$FKEKKTotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FKEKK%'";
$FKEKKResult = mysqli_query( $conn, $FKEKKTotal);
$FKEKK = mysqli_num_rows ($FKEKKResult);

$FKETotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FKE%'";
$FKEResult = mysqli_query( $conn, $FKETotal);
$FKE = mysqli_num_rows ($FKEResult);

$FPTTTotal = "SELECT * FROM student WHERE `studFaculty` LIKE '%FPTT%'";
$FPTTResult = mysqli_query( $conn, $FPTTTotal);
$FPTT = mysqli_num_rows ($FPTTResult);


// $j = 1;
// while($j <= 1){
//     $sql5 = "SELECT * FROM booking WHERE `dateTime` LIKE '%$j%'";
//     $result5 = mysqli_query( $conn, $sql5);
//     $jan = mysqli_num_rows ($result5);
// }




?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Dashboards | UTeM SportArena</title>
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
            background-color: whitesmoke;
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
                        <!-- <div class="row">
                                    <h2 class="page-title text-center mb-3" style="color:black; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Welcome To UTeM SportArena Managements Page</h2>
                        </div> -->
                        <!-- end row -->

                            <div class="row">
                                <div class="col m-2">

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="card widget-flat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                    <a class="mdi mdi-office-building-marker-outline bg-white widget-icon" href="staff-facility-list.php"></a>
                                                    </div>
                                                    <h5 class=" fw-normal mt-0 text-white" title="Number of Customers">Total Facility</h5>
                                                    <h3 class="mt-3 mb-3"><?=$resultCheck?> Facilities</h3>
                                                    <span class="text-nowrap offset-2" style="text-center">Indoor & Outdoor Sport</span>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->

                                        <div class="col-3">
                                            <div class="card widget-flat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                    <a class="mdi mdi-account-multiple bg-white widget-icon" href="staff-registered-student.php"></a>
                                                    </div>
                                                    <h5 class="fw-normal text-white mt-0" title="Number of Orders">Registered Student</h5>
                                                    <h3 class="mt-3 mb-3"><?=$resultCheck2?> Students</h3>
                                                    <span class="text-nowrap" style="text-center">Approved Student Account Request</span>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->

                                        <div class="col-3">
                                            <div class="card widget-flat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                    <a class="mdi mdi-clipboard-list-outline bg-white widget-icon" href="booking-list-pending.php"></a>
                                                    </div>
                                                    <h5 class="fw-normal text-white mt-0" title="Number of Orders">Pending Booking</h5>
                                                    <h3 class="mt-3 mb-3"><?=$Pending?> Pendings</h3>
                                                    <span class="text-nowrap offset-1" style="text-center">Waiting List For Comformation</span>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->

                                        <div class="col-3">
                                            <div class="card widget-flat bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                    <a class="mdi mdi-clipboard-check-multiple-outline bg-white widget-icon" href="booking-list-approved.php"></a>
                                                    </div>
                                                    <h5 class="fw-normal text-white mt-0" title="Number of Orders">Approved Booking</h5>
                                                    <h3 class="mt-3 mb-3"><?=$approved?> Bookings</h3>
                                                    <span class="text-nowrap offset-2" style="text-center">Accepted Student Booking</span>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                                    </div> <!-- end row -->
                                </div> <!-- end col -->

                            </div>
                            <!-- end row -->


                            <div class="row">
                                        <div class="col-8" style="justify-content-center">
                                        <div class="row">

                                        
                                            <div class="card card-h-70 ">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                            <!-- item-->
                                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                        </div>
                                                    </div>
                                                    <h4 class="header-title mb-3">Approved booking By Month</h4>

                                                    <div dir="ltr">
                                                        <canvas id="myChart" ></canvas>
                                                    </div>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col -->

                                        <div class="col-12">
                                        <div class="card card-h-70">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Registered Student By Faculty</h4>

                                                <div dir="ltr">
                                                    <canvas id="studentGraf" ></canvas>
                                                </div>

                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>

                                        </div> <!-- end row for this col -->

                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Sport Selection By Student</h4>

                                                <div dir="ltr1">
                                                        <canvas id="sportGraf" ></canvas>
                                                    </div>

                                                <div class="chart-widget-list">
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #ed1b24;"></i> Archery
                                                        <span class="float-end"><?=$archery?></span>
                                                    </p>
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #3ec92e;"></i> Badminton
                                                        <span class="float-end"><?=$badminton?></span>
                                                    </p>
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #fdee21;"></i> BasketBall
                                                        <span class="float-end"><?=$basketball?></span>
                                                    </p>
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #f24797;"></i> Cycling
                                                        <span class="float-end"><?=$cycling?></span>
                                                    </p>
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #f7ab3b;"></i> Gymnasium
                                                        <span class="float-end"><?=$futsal?></span>
                                                    </p>
                                                    <p>
                                                        <i class="mdi mdi-square " style="color: #f7ab3b;"></i> Futsal
                                                        <span class="float-end"><?=$futsal?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="mdi mdi-square " style="color: #d24e9a;"></i> Hockey
                                                        <span class="float-end"><?=$Hockey?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="mdi mdi-square " style="color: #1c77b1;"></i> Sepak Takraw
                                                        <span class="float-end"><?=$takraw?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="mdi mdi-square " style="color: #1c77b1;"></i> Table Tennis
                                                        <span class="float-end"><?=$takraw?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="mdi mdi-square " style="color: #1c77b1;"></i> Tennis
                                                        <span class="float-end"><?=$takraw?></span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="mdi mdi-square " style="color: #1a1363;"></i> Volley Ball
                                                        <span class="float-end"><?=$volley?></span>
                                                    </p>
                                                </div>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                            </div>



                            <!-- <div class="row ">
                                    <div class="col-3">
                                        <div class="card d-block">
                                            <div class="card-body ">
                                                <div class="float-end">
                                                    <a class="mdi mdi-office-building-marker-outline widget-icon" href="staff-facility-list.php"></a>
                                                </div>
                                                <h5 class="fw-normal mt-0" title="Number of Customers">Total Facility</h5>
                                                <h3 class="mt-3 mb-3" style="color:#0093AB;"><?=$resultCheck?> Facilities</h3>
                                            </div> 
                                        </div> 
                                    </div> 

                                    <div class="col-3">
                                        <div class="card d-block">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <a class="mdi mdi-account-multiple widget-icon" href="staff-registered-student.php"></a>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Registered Student</h5>
                                                <h3 class="mt-3 mb-3" ><?=$resultCheck2?> Students</h3>
                                            </div> 
                                        </div>
                                    </div> 

                                    <div class="row ">
                                    <div class="col-3">
                                        <div class="card d-block">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <a class="mdi mdi-clipboard-list-outline widget-icon" href="booking-list-pending.php"></a>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Pending Booking</h5>
                                                <h3 class="mt-3 mb-3" style="color:#FFCD38;"><?=$Pending?> Bookings</h3>

                                            </div> 
                                        </div> 
                                    </div>  -->

                                    <!-- <div class="col-3">
                                        <div class="card d-block">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <a class="mdi mdi-clipboard-check-multiple-outline widget-icon" href="booking-list-approved.php"></a>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Approved Booking</h5>
                                                <h3 class="mt-3 mb-3" style="color:green;"><?=$approved?> Bookings</h3>
                                            </div> 
                                        </div> 
                                    </div>
                                    </div> -->
                            </div>
                            <!-- <img src="../img/pusat-sukan-padang.jpg" class="img-fluid" alt="pusat-sukan-background" style="height: 10%; width: 100%;"> -->
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
                                    <script>document.write(new Date().getFullYear())</script>© UTeM - PSM 1
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
                <script src="../js/vendor/apexcharts.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                
        
    </body>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Total Booking',
                    data: [ <?php echo $jan ?>,
                            <?php echo $feb ?>, 
                            <?php echo $march ?>, 
                            <?php echo $april ?>, 
                            <?php echo $may ?>, 
                            <?php echo $june ?>, 
                            <?php echo $july?>, 
                            <?php echo $august ?>, 
                            <?php echo $september ?>, 
                            <?php echo $october ?>, 
                            <?php echo $november ?>, 
                            <?php echo $december ?>],
                    borderColor: [
                        '#5769f7'
                    ],
                    backgroundColor: '#5769f7',
                    hoverBackgroundColor:'#040270',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                            duration: 5000,
                        }
            }
        });
        </script>

    <script>
        const ctx1 = document.getElementById('sportGraf').getContext('2d');
        const sportGraf = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Archery', 'Badminton', 'BasketBall', 'Cycling', 'Futsal', 'Hockey', 'Sepak Takraw', 'Volley Ball'],
                datasets: [{
                    label: 'Total Booking',
                    data: [ <?php echo $archery ?>,
                            <?php echo $badminton ?>, 
                            <?php echo $basketball ?>, 
                            <?php echo $cycling ?>, 
                            <?php echo $futsal ?>, 
                            <?php echo $Hockey ?>, 
                            <?php echo $takraw?>, 
                            <?php echo $volley ?>],
                    // borderColor: [
                    //     '#5769f7'
                    // ],
                    backgroundColor: [
                    '#ed1b24',
                    '#3ec92e',
                    '#fdee21',
                    '#f24797',
                    '#f7ab3b',
                    '#d24e9a',
                    '#1c77b1',
                    '#1a1363'
                    ],


                    hoverOffset: 25,
                    borderWidth: 1
                }]
            },
            options: {
                        animation: {
                            duration: 4500,
                        },
                    },
        });
    </script>

    
<script>
        const ctx2 = document.getElementById('studentGraf').getContext('2d');
        const studentGraf = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['FKP', 'FTMK', 'FKM', 'FKEKK', 'FKE', 'FPTT'],
                datasets: [{
                    label: 'Total Student',
                    data: [ <?php echo $FKP ?>,
                            <?php echo $FTMK ?>, 
                            <?php echo $FKM ?>, 
                            <?php echo $FKEKK ?>, 
                            <?php echo $FKE ?>, 
                            <?php echo $FPTT ?>],
                    backgroundColor: [
                    '#3ec92e',
                    '#fdee21',
                    '#ed1b24',
                    '#f24797',
                    '#1a1363',
                    '#1c77b1'
                    ],

                    hoverBackgroundColor:'#080808',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
            }
        });
    </script>

</html>
