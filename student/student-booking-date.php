<?php
include "../sql/config.php";
$userLogin = $_SESSION['userUniqeName'];

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

    // $sportName = $row["sportName"];
    // $sportVenue = $row["sportVenue"];
    // $sportImage = $row["sportImage"];
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     //trim
//     $id = trim($_POST["id"]);
//     $sportName = trim($_POST["sportName"]);
//     $sportVenue = trim($_POST["sportVenue"]);
//     $bookingBy = trim($_POST["bookingBy"]);
//     $bookingDate = trim($_POST["bookingDate"]);
//     $bookingTime = trim($_POST["bookingTime"]);

//     //Query
//     $sql = "INSERT INTO booking (bookingBy, sportName, sportVenue, bookingDate, bookingTime) VALUE (?,?,?,?,?)" ;
//     $stmt = mysqli_prepare($conn, $sql);

//     //Bind 
//     mysqli_stmt_bind_param($stmt, "sssss", $bookingBy, $sportName,  $sportVenue, $bookingDate, $bookingTime);

//     //execute
//     if (mysqli_stmt_execute($stmt)) {
//         echo "<script>alert('Successfully made the booking');window.location.href='student-facility-list.php'</script>";
//     }
//     else {
//         echo "<script>alert('Sorry, your databse problem ');window.location.href='student-facility-list.php'</script>";
//     }
// }


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

    $calendar .= "<a class='btn btn-primary btn-xs mb-4 mr-2' href='?month=".$prev_month."&year=$prev_year' >Prev Month</a>";

    $calendar .= "<a class='btn btn-primary btn-xs mb-4 mr-2' href='?month=".date('m')."&year=".date('Y')."' >Current Month</a>";

    $calendar .= "<a class='btn btn-primary btn-xs mb-4 mr-2' href='?month=".$next_month."&year=$next_year' >Next Month</a></center>";


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
                $calendar.="<td class='$today'><h4>$currentDayRel</h4><a class='btn btn-danger btn-sm'>Booked</a></td>";
            }
            else{
                $calendar.="<td class='$today'><h4>$currentDayRel</h4><a class='btn btn-success btn-sm'>Book</a></td>";
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
$mysqli = new mysqli('localhost','root','','utemsportarena_db');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("SELECT * from booking where date = ?");
    $stmt->bind_param('s', $date,);
    $booking = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $booking[] = $row['timeslot'];
            }
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $sportname = $_POST['sportName'];
    $sportVenue = $_POST['sportVenue'];
    $timeslot = $_POST['timeslot'];

    $stmt = $mysqli->prepare("SELECT * from booking where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    $booking = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";

        }else{
            $stmt = $mysqli->prepare("INSERT INTO booking (name, sportName, sportVenue, timeslot, date, facility_id) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('sssssi', $name, $sportName, $sportVenue, $timeslot, $date, $id);
            $stmt->execute();
            echo "<script>alert('Booked Successfully ');window.location.href='student-facility-list.php?date=" . $date . "'</script>";
            // echo "<script>alert('Booked Successfully ');window.location.href='student-booking-only.php'</script>";
            // $msg = "<div class='alert alert-success'>Booking Successfull</div>";

            

            $booking[] =$timeslot;

            // if (mysqli_stmt_execute ($stmt)){
            //     echo "<script>alert('Booked Successfully ');window.location.href='student-booking-only.php'</script>";
            // }
            // else {
            //     echo "<script>alert('Sorry, your databse problem ');window.location.href='student-booking-only.php</script>";
            // }

            $stmt->close();
            $mysqli->close();
        }
    }



}

$duration = 60;
$cleanup = 0;
$start = "14:00";
$end = "20:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
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

            body{
                background-image:url(../img/dewan-pusat-sukan.jpeg);
                background-repeat: no-repeat;
                background-size: 100%;
            }

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
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->



                  <!-- Start Content-->
                  <div class="container">
                      <div class="card mt-4 p-4">
                      <center><h3>Available TimeSlot : <?php echo date(' d F Y', strtotime($date)) ?></h3></center>
                        
                            <div class="row">
                                <div class="col-md-12 col-md-offset-4">
                                    <form action="" method="post" autocomplete="off">
                                        <div class="row">
                                            <div class="col-md-12">
                                            
                                                    <?php echo(isset($msg))?$msg:""; ?>
                                                </div>
                                                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
                                                        foreach($timeslots as $ts){
                                                    ?>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="form-group">

                                                        <?php if(in_array($ts, $booking)){ ?>
                                                            <button class="btn btn-danger "><?php echo $ts; ?></button>
                                                            

                                                        <?php }else{?>
                                                            <button class="btn btn-primary book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>

                                                        <?php }?>

                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                            </div>
                                            <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content modal-filled bg-dark">
                                                        <div class="modal-header">
                                                        <h1 class="text-center">Booking Date :<?php echo date(' d, F Y', strtotime($date)) ?></span> <h1><hr>
                                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                            
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                            <h4 class="modal-title"></span></h4>
                                                                <div class="col-lg-12">
                                                                    <form action="" method="post">
                                                                    <div class="form-group">
                                                                            <label for="">Time Slot</label>
                                                                            <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Name</label>
                                                                            <input required type="text" class="form-control" name="name">

                                                                            <input type="hidden" id="sportName" name="sportName">
                                                                            <input type="hidden" id="sportVenue" name="sportVenue">

                                                                            <div class="form-group pull-right">
                                                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>    
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                  </div>

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

        <script>
            $(".book").click(function(){
                var timeslot = $(this).attr('data-timeslot');
                $("#slot").html(timeslot);
                $("#timeslot").val(timeslot);
                $("#sportName").val("anjirr")
                $("#sportVenue").val("alipp")
                $("#myModal").modal("show");
            });
        </script>

</body>
</html>