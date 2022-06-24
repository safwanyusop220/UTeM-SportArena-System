<?php
//Database Connection
include "../sql/config.php";
include "../sql/secure.php";
$userLogin = $_SESSION['userUniqeName'];

// session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Booking History | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="../style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>



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

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
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
                    <img src="../images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../images/logo_sm_dark.png" alt="" height="16">
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
                                        <span class="account-position" style="color:white;">Student Access</span>
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
                            <div class="page-title-box">
                                <h2 class="page-title text-center"  style="color: #1A1925; font-size: 30px; font-family:'Roboto'">Booking History For <?=$userLogin?></h2>

                                <h6 class="page-title-right">
                                        <nav aria-label="breadcrumb text-end " style="font-size: 17px;">
                                            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                                                <li class="breadcrumb-item"><a href="student-dashboard.php"><i class="uil-home-alt"></i> Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="student-booking-history.php">Booking History</li>
                                            </ol>
                                        </nav>

                                    </h6>
                            </div>
                        </div>


                        <div class="col-12" >
                                <div class="card px-auto mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title"></h4>
                                        <div class="tab-content">

                                            <form action='' method="post" >
                                                <select name="filterList">
                                                    <option selected="selected">Select Option</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Reject">Reject</option>
                                                </select>
                                                <br/>
                                                <input class="btn btn-warning mt-2 mb-2" type='submit'value='Filter'>
                                            </form>



                                            <div class="tab-pane show active" id="bordered-color-table-preview">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-bordered border-secondary table-centered mb-0 ">
                                                        <thead style="background-color: #1d2832; color: white;">
                                                            <tr>
                                                                <th style="width: 20px; text-align: center;">Booking No.</th>
                                                                <th style="width: 130px; text-align: center;">Booking Date</th>
                                                                <th style="width: 130px; text-align: center;">Sport Name</th>
                                                                <th style="width: 300px; text-align: center;">Venue</th>
                                                                <th style="width: 200px; text-align: center;">Status</th>
                                                                <th style="width: 300px; text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <?php
                                                                //Query

                                                                // $sql=mysqli_query($mysqli,"SELECT * FROM booking WHERE studMatric='".$_SESSION['userMatricNum'];."'");
                                                                // $sql=mysqli_query($mysqli,"SELECT * FROM booking WHERE matricNum='$userMatricNum'");

                                                                if(isset($_POST["filterList"])){
                                                                    $filter = $_POST["filterList"];

                                                                    $sql = "SELECT * FROM booking WHERE studMatric='$userMatricNum' && `status`='$filter' ORDER BY id";
                                                                }else{
                                                                        $sql = "SELECT * FROM booking  WHERE studMatric='$userMatricNum' && `status`='Pending' ORDER BY id";
                                                                    }
                                                                $result = mysqli_query( $conn, $sql);
                                                                $resultCheck = mysqli_num_rows ($result);

                                                                if ($resultCheck > 0){
                                                                    
                                                                    // Get Data
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                        // Get Data
                                                                        //Declaration
                                                                        $id = $row["id"];
                                                                        $sportName = $row["sportName"];
                                                                        $sportVenue = $row["sportVenue"];
                                                                        $dateTime = $row["dateTime"];
                                                                        $userMatricNum = $row["studMatric"];
                                                                        $bookingBy = $row["bookingBy"];
                                                                        $status = $row["status"]
                                                            ?>
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 20px; text-align: center;"><h4><span class="badge badge-info-lighten"><?=$id?></span></h4></td>
                                                                <td style="width: 130px; text-align: center; font-size: 25px;"><h4><span class="badge badge-primary-lighten"><i></i><?=$dateTime?></span></h4></td>
                                                                <td style="width: 130px; text-align: center; font-size: 25px;"><h4><span class="badge badge-dark-lighten"><i></i><?=$sportName?></span></h4></td>
                                                                <td style="width: 130px; text-align: center; font-size: 25px;"><h4><span class="badge badge-dark-lighten"><i></i><?=$sportVenue?></span></h4></td>
                                                                <td style="width: 200px; text-align: center;"><?=$status?></td>
                                                                <td style="width: 300px; text-align: center;"> 
                                                                    <a href="booking-view.php?id=<?= $id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-text-box-search mdi-18px"></i> View</a>
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
                                                                    // echo "<script>alert('There are no data exist');window.location.href='student-booking-list.php'</script>";
                                                                }
                                                            ?>
                                                    </table>
                                                </div> <!-- end table-responsive-->                     
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

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
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check"
                        checked>
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

</body>
</html>