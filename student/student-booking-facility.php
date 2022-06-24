<?php
include "../sql/config.php";

include "../sql/secure.php";
$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "student"){
    header("location: ../sql/logout.php");
}



if (isset($_GET["id"])) {

    // Declaration
    $id = $_GET["id"];
    $cid = $_GET["id"];


    // Get Data
    $sql = "select * from facility where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sportName = $row["sportName"];
    $sportVenue = $row["sportVenue"];
    $sportImage = $row["sportImage"];
    $totalFacility = $row["totalFacility"];

    $mysqli = new mysqli('localhost', 'root','','utemsportarena_db');

    $stmt = $mysqli -> prepare('select * from facility');

    $facilitys = "";
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $facilitys = "<option value='".$row['id']."'>".$row['sportName']."</option>";
            }
        }
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //trim
    $id            = trim($_POST["id"]);
    $bookingBy     = trim($_POST["bookingBy"]);
    $sportName     = trim($_POST["sportName"]);
    $sportVenue    = trim($_POST["sportVenue"]);
    $bookingDate   = trim($_POST["bookingDate"]);
    $bookingTime   = trim($_POST["bookingTime"]);
    $userMatricNum = trim($_POST["matricNum"]);
    $sessionStudId = trim($_POST["studId"]);


    

    //Query
    $sql = "INSERT INTO booking (bookingBy, sportName, sportVenue, bookingDate, bookingTime, studMatric, studId) VALUE (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    //Bind 
    mysqli_stmt_bind_param($stmt, "sssssss", $bookingBy, $sportName, $sportVenue, $bookingDate, $bookingTime, $userMatricNum, $sessionStudId  );
    
    //execute
    if (mysqli_stmt_execute($stmt)) {

        echo "<script>alert('Successfully made the booking');window.location.href='student-facility-list.php'</script>";

    }
    else {
        echo "<script>alert('Sorry, your databse problem ');window.location.href='student-facility-list.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Booking Date | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <link href="../css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->



    <!-- Datepicker -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Datatables css -->
    <!-- <link href="../css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" /> -->
            <style>
                /* input[type=text] {

                    position: center;
                    text-align: center;
                    padding: 12px ;
                    box-sizing: border-box;
                    border: 2px solid blue;
                    border-radius: 4px;
                    color: black;
                    background-color: blue;
                } */
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function(){

                    // Declaration
                    var cid = document.getElementById('facilityId').value;
                    var calendarBook = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarBook,{
                        initialView:  'dayGridMonth',
                        selectable: true,
                        eventOverlap: false,
                        eventLimit: true,                      

                        //Letak event dalam tble
                        events: ('../sql/calendarData.php?value='+cid),

                        businessHours: {
                        // days of week. an array of zero-based day of week integers (0=Sunday)
                        daysOfWeek: [1, 2, 3, 4, 5], // Monday - Thursday

                        },
                        // selectConstraint: "businessHours",
                        
                        //table clicked
                        dateClick: function(e) {

                            // Get Today
                            var dt = calendar.getDate();
                            var year = dt.getFullYear();
                            var month = dt.getMonth() + 1;
                            var day = dt.getDate();

                            if(month < 9){
                                month = '0'+month;
                            }

                            if(day < 9){
                                day = '0'+day;
                            }

                            var today = year + '-' + month + '-' + day;

                            // Get Selected Date
                            var check = e.dateStr;
                
                            let A = today.toString();
                            let B = check.toString();

                            if(B >= A){
                                $("#dateBookingModal").modal("show"); 
                                $("#date").val(e.dateStr);
                            }
                            else{
                                alert('This date cannot be select');
                            }
                        },

                        //click event
                        eventClick: function (e){
                            $("#bookedDate").modal("show");
                            $("#date").val(e.dateStr);
                        },


                    });
                    calendar.render();
                });
            </script>
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
                                <h2 class="page-title text-center"  style="color: #1A1925; font-size: 35px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Booking Date</h2>
                                    <h6 class="page-title-right">

                                        <nav aria-label="breadcrumb text-end" style="font-size: 14px;">
                                            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                                                <li class="breadcrumb-item"><a href="student-dashboard.php"><i class="uil-home-alt"></i> Home</a></li>
                                                <li class="breadcrumb-item"><a href="student-facility-list.php">Facility List</a></li>
                                                <li class="breadcrumb-item active" aria-current="student-booking-facility.php">Booking Date</li>
                                            </ol>
                                        </nav>

                                    </h6>
                                </div>
                            </div>
                        </div><!-- end page title -->      

                        <div class="card">
                                <div class='row justify-content-center'>
                                    <div class='col-md-2 form-group text-center' style="font-size: 20px;">
                                        <label >Selected Sport</label>
                                        <input type='text' class='form-control mb-2' style="background-color:#808080; color:white; text-align:center; font-weight:bold;" value='<?=$sportName?>' id='sport_select' readonly>
                                    </div>
                                </div>
                            <div class="card-body" style="background-color:#708090; color:white;">
                                <input type="hidden" id="facilityId"  name="facilityId" value="<?= $cid?>">
                                <input type="hidden" id="facilityId"  name="bookingBy" value="<?= $userLogin?>">
                                <input type="hidden" id="matricNum"  name="matricNum" value="<?= $userMatricNum?>">
                                
                                <div id="calendar"></div>
                            </div>
                        </div>

                        <div>
                            <!-- date modal-->
                            <div id="dateBookingModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                            
                                        <div class="modal-body ">
                                            <div class="text-center mt-2 mb-4">
                                                <a href="index.html" class="text-success">
                                                <img src="../images/logo_utem.png" alt="" width="230" height="54">
                                                    <!-- <span><img src="../images/logo_utem.png" alt="" height="18"></span> -->
                                                </a>
                                            </div>
                            
                                            <form class="ps-3 pe-3" action="../sql/Booking.php" method="POST">
                                            <input type="hidden" id="facilityId"  name="facilityId" value="<?= $cid?>">
                                            <input type="hidden" id="bookingBy"  name="bookingBy" value="<?=$userLogin?>">
                                            <input type="hidden" id="studId"  name="studId" value="<?=$sessionStudId?>">
                                            <input type="hidden" id="matricNum"  name="matricNum" value="<?=$userMatricNum?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Sport Name</label>
                                                    <input class="form-control" type="text" value='<?=$sportName?>' name="sportName" readonly>
                                                </div>
                            
                                                <div class="mb-3">
                                                    <label class="form-label">Sport Venue</label>
                                                    <input class="form-control" type="text" value='<?=$sportVenue?>' name="sportVenue" readonly >
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date" class="form-label">Booking For</label>
                                                    <input class="form-control" type="text" name="date" id="date" readonly >
                                                </div>

                                                <div class="mb-3">
                                                <label for="role" class="form-label">Select TimeSlots</label>
                                                    <select class="form-select" name="timeSlots" id="timeSlots" aria-label="Default select example">
                                                        <option selected value="12:00">12:00PM - 2:00PM</option>
                                                        <option selected value="14:00">2:00PM - 4:00PM</option>
                                                        <option selected value="16:00">4:00PM - 6:00PM</option>
                                                        <option selected value="18:00">6:00PM - 8:00PM</option>
                                                        <option selected value="20:00">8:00PM - 10:00PM</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-success" name="btnSubmit" type="submit">Book Now</button>
                                                </div>
                            
                                            </form>
                            
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </div>

                        <div>
                            <!-- date modal-->
                            <div id="bookedDate" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                            
                                        <div class="modal-body bg-success">
                                            <div class="text-center mt-2 mb-4">
                                                <a href="#" class="text-success">
                                                <img src="../images/logo_utem.png" alt="" width="230" height="54">
                                                </a>
                                            </div>
                                           
                            
                                            <form class="ps-3 pe-3" action="../sql/Booking.php" method="POST">
                                            <input type="hidden" id="facilityId"  name="facilityId" value="<?= $cid?>">
                                            


                                                <div class="mb-3">
                                                    <label class="form-label text-white">Sport Name</label>
                                                    <input class="form-control" type="text" value='<?=$sportName?>' name="sportName" readonly>
                                                </div>
                            
                                                <div class="mb-3">
                                                    <label class="form-label text-white">Sport Venue</label>
                                                    <input class="form-control" type="text" value='<?=$sportVenue?>' name="sportVenue" readonly >
                                                </div>

                                                <div class="mb-3">
                                                    <label for="bookedBy" class="form-label text-white">Total Facility</label>
                                                    <input class="form-control" type="text" name="bookedBy" value='<?=$totalFacility?>' id="bookedBy" readonly >
                                                </div>

                                                <!-- <div class="mb-3"> -->
                                                <!-- <label for="role" class="form-label">Select TimeSlots</label>
                                                    <select class="form-select" name="timeSlots" id="timeSlots" aria-label="Default select example">
                                                        <option selected value="12:00">12:00PM - 2:00PM</option>
                                                        <option selected value="14:00">2:00PM - 4:00PM</option>
                                                        <option selected value="16:00">4:00PM - 6:00PM</option>
                                                        <option selected value="18:00">6:00PM - 8:00PM</option>
                                                        <option selected value="20:00">8:00PM - 10:00PM</option>
                                                    </select>
                                                </div> -->

                                                <!-- <div class="mb-3 text-center">
                                                    <button class="btn btn-primary" name="btnSubmit" type="submit">Book Now</button>
                                                </div> -->
                            
                                            </form>
                            
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </div>
                        
                        
                    </div> <!-- container -->

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
            <script src="../js/vendor/Fullcalendar.min.js"></script>
            <script>
                function preview() {
                    frame.src = URL.createObjectURL(event.target.files[0]);
                    document.getElementById( "ImageStatus" ).value = "TRUE";
                }

                function clearImage() {
                    document.getElementById('fileToUpload').value = null;
                    frame.src = "";
                }

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</body>
</html>