<?php
//Database Connection
include "../sql/config.php";

include "../sql/secure.php";
$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "student"){
    header("location: ../sql/logout.php");
}

// Booking Calendar
function build_calendar($month, $year){

    $mysqli = new mysqli('localhost','root','','utemsportarena_db');
    $stmt = $mysqli ->prepare('SELECT * From booking where MONTH(date)=? AND YEAR(date)=?');
    $stmt->bind_param('ss',$month,$year);
    $booking = array();
        if($stmt -> execute()){
            $result=$stmt->get_result();
            if($result->num_rows > 0 ){
                while($row = $result->fetch_assoc()){
                    $booking[] = $row['date'];
                }
                $stmt->close();
            }
        }

    $daysOfWeek = array('Sunday','Monday','Tuesday','Wenesday','Thursday','Friday','Saturday');

    //get first day
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    //get number day of the month
    $numberDays = date('t', $firstDayOfMonth);

    //get info from the first day of month
    $dateComponents = getdate($firstDayOfMonth);

    //get name of month
    $monthName = $dateComponents['month'];

    //get value 0-6 of the firstday of month
    $dayOfWeek = $dateComponents['wday'];

    //get current date
    $dateToday = date("Y-m-d");

    

    $prev_month = date('m', mktime(0,0,0, $month-1, 1, $year));
    $prev_year = date('Y', mktime(0,0,0, $month-1, 1, $year));

    $next_month = date('m', mktime(0,0,0, $month+1, 1, $year));
    $next_year = date('Y', mktime(0,0,0, $month+1, 1, $year));


    $calendar = "<center><h2>$monthName $year</h2>";

    $calendar .= "<a class='btn btn-dark btn-xs mb-4 mr-4' href='?month=".$prev_month."&year=$prev_year' >Prev Month</a>";

    $calendar .= "<a class='btn btn-dark btn-xs mb-4 mr-4' href='?month=".date('m')."&year=".date('Y')."' >Current Month</a>";

    $calendar .= "<a class='btn btn-dark btn-xs mb-4 mr-4' href='?month=".$next_month."&year=$next_year' >Next Month</a></center>";


    $calendar .= "<table class='table table-bordered'>";
    $calendar .= "<tr>";

 // Create the calendar headers
        foreach($daysOfWeek as $day) {
            $calendar .= "<th  class='header'>$day</th>";
        } 

        // Create the rest of the calendar

        // Initiate the day counter, starting with the 1st.

        

        $calendar .= "</tr><tr>";
        $currentDay = 1;
        // The variable $dayOfWeek is used to
        // ensure that the calendar
        // display consists of exactly 7 columns.

        if ($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
                $calendar.= "<td  class='empty'></td>"; 

            }
        }


        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            // Seventh column (Saturday) reached. Start a new row.

            if ($dayOfWeek == 7) {

                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";

            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $dayName = strtolower(date('l', strtotime($date)));
            $today = $date==date('Y-m-d') ? "today":"";

            if(in_array($date, $booking)){
                $calendar.="<td><h4>$currentDay</h4><a class='btn btn-danger btn-sm'>Booked</a></td>";
            }
            else{
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='student-booking-date.php?date=".$date."' class='btn btn-success btn-sm'>Book</a></td>";
            }



            

            // $calendar.="<td><h4>$currentDay</h4></td>";

            // Increment counters
            $currentDay++;
            $dayOfWeek++;

        }



        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) { 

            $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

            }

        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

    return $calendar;

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
                                    <a href="student-aluan.html">Vision & Mission</a>
                                </li>
                                <li>
                                    <a href="#">Objective</a>
                                </li>
                                <li>
                                    <a href="#">Organization Chart</a>
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
                                        <span class="account-position" style="color:white;">Student</span>
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
                                <h2 class="page-title text-center mt-2"  style="color: #1A1925; font-size: 35px; font-family:'Roboto'">Facility List</h2>
                                    <h6 class="page-title-right">
                                        <nav aria-label="breadcrumb" style="font-size: 17px;">
                                            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                                                <li class="breadcrumb-item"><a href="student-dashboard.php"><i class="uil-home-alt"></i> Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="student-facility-list.php">Facility List</li>
                                            </ol>
                                        </nav>

                                    </h6>
                                </div>
                            </div>
                        </div><!-- end page title -->  


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
                                            $id = $row["id"];
                                            $totalFacility = $row["totalFacility"]

                                    ?>
                                    <div class="col-lg-3 col-sm-6 mb-5">
                                    <div class="card mb-5 bg-dark" style="height: 480px;">
                                    <div class="col-lg-12">
                                        <img class="card-img" height="200px" src="<?=$sportImage ?>">
                                        </div>
                                        <div class="card-body bg-dark text-white">
                                            <h2 class="card-title text-center text-white"><?=$sportName?></h2>
                                            <!-- <p class="card-text">                                                 
                                                </p> -->
                                            <ul class="bg-dark list-group list-group-flush text-white">
                                            <li class="bg-dark list-group-item text-white"><b>Sport Venue : </b> <?=$sportVenue?></li>
                                            <li class="bg-dark list-group-item text-white"><b>Start Time : </b><?=$sportTimeStart ?> hours</li>
                                            <li class="bg-dark list-group-item text-white"><b>End Time : </b><?=$sportTimeEnd ?> hours</li>
                                            <li class="bg-dark list-group-item text-white"><b>Total Court/Facility : </b><?=$totalFacility ?> total</li>
                                            <input type="hidden" name="id" value=<?=$id?>>
                                            </ul>
                                            <div class="card-footer text-center bg-dark">
                                                 <!-- Static modal -->
                                                <!-- <a type="button" href="student-facility-list.php#staticBackdrop" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Facility Details</a> -->
                                                    <?php
                                                                // echo "<a href='student-booking-form.php?id=" .$id. "'class='btn btn-outline-success'>Go To Booking Page </a>";
                                                                echo "<a href='student-booking-facility.php?id=".$id."'class='btn btn-warning'>Check Availability</a>";

                                                                // echo "<a href='student-booking-only.php?id=" .$id. "'class='btn btn-warning'>Go To Booking Page </a>";
                                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <?php
                                        }                                         
                                    }
                                    else{

                                        // If error
                                        echo "<script>alert('error');window.location.href='student-facility-list.php'</script>";
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


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="../js/vendor.min.js"></script>
    <script src="../js/app.min.js"></script>
    <script>
     $(function(){
        $('#subscribe-email-form').on('submit', function(e){
            e.preventDefault();
                $.ajax({
                url: url, //this is the submit URL
                type: 'GET', //or POST
                data: $('#subscribe-email-form').serialize(),
                success: function(data){
                alert('successfully submitted')
                }
                    });
                        });
                            });
    </script>

</body>

</html>