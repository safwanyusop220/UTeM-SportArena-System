<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- App css -->
    <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />



</head>

<body class="loading authentication-bg"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html" class=".fs-2" style="color: black;">
                                UTeM Sport Arena
                                <!-- <span><img src="assets/images/logo.png" alt="" height="18"></span> -->
                            </a>
                            <!-- <a href="index.html">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a> -->
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Student Regsitration</h4>
                                <p class="text-muted">Are you UTeM staff ?<br> click here<a
                                        href="pages-register-staff.html" class="text-muted ms-1"><b>Staff Sign
                                            In</b></a></p>
                            </div>

                            <form action="db.php" method="post">

                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" id="fullname" name="fullName"
                                        placeholder="Enter your name" required>
                                </div>


                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Select your Role</label>
                                
                                <select class="form-select" aria-label="Default select example">
                                    
                                    <option value="1">Student</option>
                                    <option value="2">Staff</option>
                                  </select>
                                </div>

                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required
                                        placeholder="Register with your student email">
                                </div>

                                <!-- Default dropend button -->
                                <!-- <div class="mb-2 btn-group dropend">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Faculty
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button">FTMK</button></li>
                                        <li><button class="dropdown-item" type="button">FKP</button></li>
                                        <li><button class="dropdown-item" type="button">FTKEE</button></li>
                                        <li><button class="dropdown-item" type="button">FKE</button></li>
                                        <li><button class="dropdown-item" type="button">FPTT</button></li>
                                        <li><button class="dropdown-item" type="button">FKM</button></li>
                                    </ul>
                                </div> -->

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                        <label class="form-check-label" for="checkbox-signup">I accept <a href="#"
                                                class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div> -->

                                <div class=" text-center">
                                    <!-- <input type="submit" name="signInAction" value="Sign In" class="btn btn-primary"> -->
                                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="index.html"
                                    class="text-muted ms-1"><b>Log In</b></a></p>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2022 @ PSM 1 - UTeM
    </footer>

    <!-- bundle -->
    <script src="js/vendor.min.js"></script>
    <script src="js/app.min.js"></script>
</body>


</html>