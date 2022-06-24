<?php
include "config.php";
session_start();

if (isset($_POST['btnLogin'])) {

    //get + set
    $email = $_POST['email'];
    $password = $_POST['password'];


    //sql query
    $query = "SELECT * FROM administrator where email = '$email' && `password` = '$password'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        // $sessionAdmin = $_SESSION['email'];
        header("location: ../admin/admin-dashboard.php");
    }
    else{
        //sql query
        $query = "SELECT * FROM staff where staffEmail = '$email' && staffPassword = '$password'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userUniqeName'] = $row['staffName'];
            $_SESSION['userUniqeAccess'] = "staff";
            header("location: ../staff/staff-dashboard.php");
    
        }else{
            $query = "SELECT * FROM student where studEmail = '$email' && studPassword = '$password'";
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
    
            if ($resultCheck > 0) {
                //get data
                $row = mysqli_fetch_assoc($result);
                $_SESSION['userUniqeName'] = $row['studName'];
                $_SESSION['userMatricNum'] = $row['studMatric'];
                $_SESSION['studentId'] = $row['id'];
                
                $_SESSION['userUniqeAccess'] = "student";;
                header("location: ../student/student-dashboard.php");
            }
            else {
                echo "<script>alert('The email Invalid or do not Approved yet');window.location.href='../index.html'</script>";
            }
        }

    }

}

else {
    header("../index.html");
}
?>