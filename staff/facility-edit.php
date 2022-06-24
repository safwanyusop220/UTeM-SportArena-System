<?php
    include "../sql/config.php";

    //Declaration
    $sportName = "";
    $sportVenue = "";
    $sportTimeStart = "";
    $sportTimeEnd = "";
    $sportImage = "";
    $ImageStatus = "False";
    $totalFacility = "";

    if (isset($_GET["id"])){

        // Declaration
        $id = $_GET["id"];

        // Get Data
        $sql = "select * from facility where id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $sportName      = $row["sportName"];
        $sportVenue     = $row["sportVenue"];
        $sportTimeStart = $row["sportTimeStart"];
        $sportTimeEnd   = $row["sportTimeEnd"];
        $sportImage     = $row["sportImage"];
        $totalFacility  = $row["totalFacility"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //trim
        $id             = trim( $_POST["id"]);
        $sportName      = trim( $_POST["inputSportName"]);
        $sportVenue     = trim( $_POST["inputSportVenue"]);
        $sportTimeStart = trim( $_POST["sportTimeStart"]);
        $sportTimeEnd   = trim( $_POST["sportTimeEnd"]);
        $sportImage     = trim( $_POST["sportImage"]);
        $ImageStatus    = trim( $_POST["ImageStatus"]);
        $totalFacility  = trim( $_POST["inputTotalFacility"]);
        
        //get image upload
        $target_dir     = "../images/sports/";
        $target_file    = $target_dir.basename( $_FILES["fileToUpload"]["name"] );
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($ImageStatus != "False"){

            //checkking image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            
            if ($check !== false){
    
                $uploadOk =1;
    
                //check if file already exist
                if (file_exists($target_file) ){
                    // echo"Sorry, the file already exist";
                    echo "<script>alert('Sorry, the file already exist!!');window.location.href='staff-facility-list.php'</script>";
                    $uploadOk = 0;
                }
        
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    echo "<script>alert('Sorry, wrong file format');window.location.href='staff-facility-list.php'</script>";
                    $uploadOk = 0;
                }
        
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                    echo "<script>alert('Sorry, your file was not uploaded');window.location.href='staff-facility-list.php'</script>";
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
                        echo "<script>alert('Sorry, error when uploading file');window.location.href='staff-facility-list.php'</script>";
                    }
                }   
            }
    
            else{
               var_dump("No Image Detect");
               exit();
            } 
            
        }
        
        //Query
        $sql = "UPDATE facility SET sportName=?, sportVenue=?, sportTimeStart=?, sportTimeEnd=?, sportImage=?, totalFacility=? WHERE id=?" ;
        $stmt = mysqli_prepare($conn, $sql);

        //Bind 
        mysqli_stmt_bind_param($stmt, "sssssii", $sportName, $sportVenue, $sportTimeStart, $sportTimeEnd, $sportImage, $totalFacility, $id);

        //execute
        if (mysqli_stmt_execute ($stmt)){
            echo "<script>alert('Successfully update the facility data');window.location.href='staff-facility-list.php'</script>";
        }
        else {
            echo "<script>alert('Sorry, your databse problem ');window.location.href='staff-facility-list.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Facility Edit | UTeM SportArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="../css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Datatables css -->
    <link href="../css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
    


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
                                        <span class="account-user-name" style="color:white; font-weight:bold; font-family:'Roboto'">staff</span>
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
                        <div class="col-xxl-4 col-lg-5">
                            <div class="page-title-box">

                                <div class="page-title-right">

                                    <div class="card " style="width: 38rem; offset-2">
                                    <div class="card-header mt-2 bg-success">
                                                <h2 class="card-title text-center text-white" >Edit Facility</h2>
                                                </div>
                                        <div class="card-body">

                                            <!-----------------------FORM ----------------------->
                                            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                                                <input type="hidden" name="id" value="<?= $id?>">
                                                <div class="mb-3">
                                                    <label for="inputSportName" class="form-label">Sport Name</label>
                                                    <input type="text" class="form-control" id="inputSportName"name="inputSportName" value="<?= $sportName?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputSportVenue" class="form-label">Sport Facility</label>
                                                    <input type="text" class="form-control" id="inputSportVenue" name="inputSportVenue" value="<?= $sportVenue?>">
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
                                                </div>

                                                <div class="mb-3">
                                                    <label for="inputTotalFacility" class="form-label">Total Court/Facilities</label>
                                                    <input type="text" class="form-control" id="inputTotalFacility" name="inputTotalFacility" value="<?= $totalFacility?>">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="hidden" name="ImageStatus" id="ImageStatus" value="False">
                                                    <input type="hidden" name="sportImage" id="sportImage" value="<?= $sportImage?>">
                                                    <label for="Image" class="form-label">Upload Facility Image Here</label>
                                                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload" onchange="preview()">
                                                    <button onclick="clearImage()" class="btn btn-danger mt-3">Clear</button>
                                                </div>
                                                <img id="frame" src="" class="img-fluid" />

                                                <div class="card-footer text-center">
                                                    <a class="btn mt-2 btn-outline-danger" href="staff-facility-list.php">Back</a>
                                                    <button class="btn mt-2 btn-primary">Submit</button>
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
                        <div class="row" style="color:white;">
                            <div class="col-md-6">
                                <p>Developed By<b class="text-success"> Safwan Yusop </b></p>
                            </div>
                                <div class="col-6 text-end" >
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


</body>
</html>