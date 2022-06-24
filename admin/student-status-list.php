<?php
// include "../sql/secure.php";
include "../sql/config.php";
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Student List | UTeM SportArena</title>
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
            <div class="leftside-menu" style="background-color: #6777ef;  color: black;">
    

                <a href="#" class="logo text-center text-white logo-light">
                    <span class="logo-lg">
                        Admin Panel
                        <img src="images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm text-white">
                        A P
                        <img src="images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="../index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container"  data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav" style="background-color: #6777ef;  color: black;">

                    <li class="side-nav-title side-nav-item" style=" color: black;">Navigation</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                            aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-home-alt" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;"> Home<a href="student-facility-list.php"></a> </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="admin-dashboard.php" style=" color: black;">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">STAFF</li>

                    <li class="side-nav-item" style=" color: black;">
                        <a data-bs-toggle="collapse" href="#sidebarManage" aria-expanded="false"
                            aria-controls="sidebarManage" class="side-nav-link">
                            <i class="uil-chat-bubble-user" style=" color: #fcf805; "></i>
                            <span style=" color: #fcf805; ">Staff Management </span>
                        </a>
                        <div class="collapse" id="sidebarManage">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="staff-pending-account.php" style=" color: black;">Staff Pending Account</a>
                                </li>
                                <li>
                                    <a href="staff-status-list.php" style=" color: black;">Staff Status List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">Student</li>

                    <li class="side-nav-item" style=" color: black;">
                        <a data-bs-toggle="collapse" href="#sidebarStudent" aria-expanded="false"
                            aria-controls="sidebarStudent" class="side-nav-link">
                            <i class="uil-user-check" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;">Student Management </span>
                        </a>
                        <div class="collapse" id="sidebarStudent">
                            <ul class="side-nav-second-level">
                                <!-- <li>
                                    <a href="student-pending-account.php" style=" color: black;">Student Pending Account</a>
                                </li> -->
                                <li>
                                    <a href="student-status-list.php" style=" color: black;">Student List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item" style=" color: black;">LOGS</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarLog" aria-expanded="false"
                            aria-controls="sidebarLog" class="side-nav-link">
                            <i class=" uil-receipt-alt" style=" color: #fcf805;"></i>
                            <span style=" color: #fcf805;"> logs </span>
                        </a>
                        <div class="collapse" id="sidebarLog">
                            <ul class="side-nav-second-level">

                            </ul>
                        </div>
                    </li>
                </ul>

                    <!-- Help Box -->
                    <div class="help-box text-white text-center" style="background-color: #1d2832;">
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
                    <div class="navbar-custom" style="background-color: #6777ef;">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list" >
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="../img/user-icon.jpeg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name" style="color:blue; font:ultra;">Admin</span>
                                        <span class="account-position">Admin Access</span>
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
                                    <a href="../sql/logout.php" onclick='Are You sure to logout?' class="dropdown-item notify-item">
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


                                                    <div class="tab-pane show active" id="scroll-vertical-preview alt-pagination-preview">
                                                        <table id="scroll-vertical-datatable" class="table dt-responsive nowrap w-100">
                                                            <thead style="background-color:#1d2832; color:white;">
                                                                <tr>
                                                                <th style="width: 20px; font-size:13px; text-align:center;">ID</th>
                                                                <th style="width: 150px; font-size:13px; text-align:center;">Name</th>
                                                                <th style="width: 170px; font-size:13px; text-align:center;">Email Address</th>
                                                                <th style="width: 130px; font-size:13px; text-align:center;">Phone No.</th>
                                                                <th style="width: 100px; font-size:13px; text-align:center;">Account Status</th>
                                                                <th style="width: 225px; font-size:13px; text-align:center;">Action</th>
                                                                </tr>
                                                            </thead>   
                                                            <?php
                                                                 //Query
                                                                if(isset($_POST["filterList"])){
                                                                    $filter = $_POST["filterList"];

                                                                    $sql = "SELECT * FROM student_request WHERE `status`='$filter' ORDER BY id";
                                                                }else{
                                                                        $sql = "SELECT * FROM student_request WHERE `status`='Pending' ORDER BY id";
                                                                    }

                                                                $result = mysqli_query( $conn, $sql);
                                                                $resultCheck = mysqli_num_rows ($result);

                                                                if ($resultCheck > 0){
                                                                    
                                                                    // Get Data
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                        // Get Data
                                                                        //Declaration
                                                                        $id = $row["id"];
                                                                        $studName = $row["studName"];
                                                                        $studEmail = $row["studEmail"];
                                                                        $studMatric = $row["studMatric"];
                                                                        $studNum = $row["studNum"];
                                                                        $status = $row["status"];
                                                                        $role = $row["role"];
                                                            ?>                    
                                                            <tbody>
                                                            <tr>
                                                            <input type="hidden" value="<?=$id?>" name="id">
                                                                <td style="width: 20px; font-size:13px; text-align:center;"><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?=$id?></a> </td>
                                                                <td style="width: 170px; font-size:13px; text-align:center;"><?=$studName?> <small class="text-muted">(<?=$studMatric?>)</small></td>
                                                                <td style="width: 170px; font-size:13px; text-align:center;"><?=$studEmail?></td>
                                                                <td style="width: 130px; font-size:13px; text-align:center;"><?=$studNum?></td>
                                                                <td style="width: 100px; font-size:13px; text-align:center;"><?=$status?></td>
                                                                <td style="width: 170px; font-size:13px; text-align:center;">
                                                                    <a href="student-view-profile.php?id=<?= $id ?>" class="btn btn-info btn-sm"><i class="mdi mdi-text-box-search mdi-18px"></i> View</a>
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
                                                                    // echo "<script>alert('Sorry, there are no data exist');window.location.href='staff-dashboard.php'</script>";
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
                            </div>
                        </div>     
                        <!-- end page title --> 

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

            

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->


                <!-- bundle -->
                <script src="../js/vendor.min.js"></script>
                <script src="../js/app.min.js"></script>
        
    </body>
</html>
