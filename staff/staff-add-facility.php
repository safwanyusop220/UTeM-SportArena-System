<?php
    include "../sql/config.php";

    include "../sql/secureStaff.php";
$userLogin = $_SESSION['userUniqeName'];

if ($userAccess != "staff"){
    header("location: ../sql/logout.php");
}


    //Declaration
    $sportName = "";
    $sportVenue = "";
    $sportTimeStart = "";
    $sportTimeEnd = "";
    $sportImage = "";
    $totalFacility = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //trim
        $sportName      = trim( $_POST["inputSportName"]);
        $sportVenue     = trim( $_POST["inputSportVenue"]);
        $sportTimeStart = trim( $_POST["sportTimeStart"]);
        $sportTimeEnd   = trim( $_POST["sportTimeEnd"]);
        $totalFacility     = trim( $_POST["inputTotalFacility"]);
        
        //get image upload
        $target_dir  = "../images/sports/";
        $target_file = $target_dir.basename( $_FILES["fileToUpload"]["name"] );
        $uploadOk    = 1;
        $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        //checkking image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        if ($check !== false){
            $uploadOk =1;
        }

        else{
            echo "<script>alert('please insert image only!!');window.location.href='staff-add-facility.php'</script>";
            $uploadOk=0;
        } 

        //check if file already exist
        if (file_exists($target_file) ){
            // echo"Sorry, the file already exist";
            echo "<script>alert('Sorry, the file already exist!!');window.location.href='staff-add-facility.php'</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo "<script>alert('Sorry, wrong file format');window.location.href='staff-add-facility.php'</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            echo "<script>alert('Sorry, your file was not uploaded');window.location.href='staff-add-facility.php'</script>";
        } 
        
        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

                //send directory
                $sportImage = $target_dir.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));

            } 
        
            else {
            // echo "Sorry, there was an error uploading your file.";
            echo "<script>alert('Sorry, error when uploading file');window.location.href='staff-add-facility.php'</script>";
            }
        }
        //Query
        $sql = "INSERT INTO facility (sportName, sportVenue, sportTimeStart, sportTimeEnd, sportImage, totalFacility) VALUE (?,?,?,?,?,?)" ;

        $stmt = mysqli_prepare($conn, $sql);

        //Bind 
            mysqli_stmt_bind_param($stmt, "sssssi", $sportName, $sportVenue, $sportTimeStart, $sportTimeEnd, $sportImage, $totalFacility);

        //execute
        if (mysqli_stmt_execute ($stmt)){
            echo "<script>alert('Successfully add new facility');window.location.href='staff-add-facility.php'</script>";
        }
        else {
            echo "<script>alert('Sorry, your databse problem ');window.location.href='staff-add-facility.php'</script>";
        }

    }


?>


<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Add Facility | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->


    <!-- Datatables css -->
    <link href="../css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />

    	
    	<script type="text/javascript" src="/cdn/jquery-1.12.4.min.js"></script>

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


h2{
    color: white;
}

</style>

<body class="loading "
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
                <div class="container">

                
                    <!-- start page title -->
                    <div class="row justify-content-center">
                        <div class="col-xxl-6">
                            <div class="page-title-box">

                                <div class="page-title-right">
                                    <div class="card " style="width: 35rem;">
                                    <div class="card-header  bg-primary">
                                                <h2 class="card-title text-center "style="color:white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Add New Facility</h2>
                                                </div>
                                        <div class="card-body">

                                            <!-----------------------FORM ----------------------->
                                            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                                                <div class="mb-3">
                                                    <label for="inputSportName" class="form-label">Sport Name</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control" id="inputSportName"name="inputSportName" value="<?= $sportName?>">
                                                        <div class="input-group-text" data-password="false">
                                                            <span class=" dripicons-basketball"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputSportVenue" class="form-label">Sport Facility</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control" id="inputSportVenue" name="inputSportVenue" value="<?= $sportVenue?>">
                                                        <div class="input-group-text" data-password="false">
                                                            <span class=" uil-building"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="sportStartTime" class="form-label">Start Time</label>
                                                    <input type="time" class="form-control" id="sportStartTime" name="sportTimeStart" value="<?= $sportTimeStart?>">
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label for="sportEndTime" class="form-label">End Time</label>
                                                    <input type="time" class="form-control" id="sportEndTime" name="sportTimeEnd" value="<?= $sportTimeEnd?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="inputTotalFacility" class="form-label">Total Court/Facilities</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="number" class="form-control" id="inputTotalFacility" name="inputTotalFacility" value="<?= $totalFacility?>">
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="dripicons-to-do"></span>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                                    <div class="mb-3">
                                                        <label for="Image" class="form-label">Upload Facility Image Here</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" type="file" id="fileToUpload" name="fileToUpload" onchange="preview()">
                                                            <div class="input-group-text" data-password="false">
                                                            <span class="dripicons-browser-upload"></span>
                                                        </div>
                                                        </div>
                                                        <button onclick="clearImage()"
                                                            class="btn btn-danger mt-3">Clear</button>
                                                    </div>
                                                    <img id="frame" src="" class="img-fluid" />

                                                <div class="card-footer text-center">
                                                    <button class="btn mt-2 btn-success">Submit</button>
                                                </div>
                                            </form>
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

            <!-- bundle -->
            <script src="../js/vendor.min.js"></script>
            <script src="../js/app.min.js"></script>

            <script src="../node_modules/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
            <script>
                $("input[type='number']").inputSpinner();
            </script>

            <!-- TouchSpin -->
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    // This button will increment the value
                    $('.qtyplus').click(function(e){
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        fieldName = $(this).attr('field');
                        // Get its current value
                        var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
                        // If is not undefined
                        if (!isNaN(currentVal)) {
                            // Increment
                            $(this).siblings('input[name='+fieldName+']').val(currentVal + 1);
                        } else {
                            // Otherwise put a 0 there
                        $(this).siblings('input[name='+fieldName+']').val(0);
                        }
                    });
                    // This button will decrement the value till 0
                    $(".qtyminus").click(function(e) {
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        fieldName = $(this).attr('field');
                        // Get its current value
                        var currentVal = parseInt($(this).siblings('input[name='+fieldName+']').val());
                        // If it isn't undefined or its greater than 0
                        if (!isNaN(currentVal) && currentVal > 0) {
                            // Decrement one
                            $(this).siblings('input[name='+fieldName+']').val(currentVal - 1);
                        } else {
                            // Otherwise put a 0 there
                            $(this).siblings('input[name='+fieldName+']').val(0);
                        }
                    });
                });
            </script>

            <script>
                function preview() {
                    frame.src = URL.createObjectURL(event.target.files[0]);
                }
                function clearImage() {
                    document.getElementById('formFile').value = null;
                    frame.src = "";
                }
            </script>



</body>
</html>