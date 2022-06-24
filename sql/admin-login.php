<?php
include "config.php";
session_start();

if (isset($_POST['admin'])) {
 
    //get + set
    $email = $_POST['email'];
    $password = $_POST['password'];

        //sql query
        $query = "SELECT * FROM administrator where email = '$email' && `password` = '$password'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);

            header("location: ../admin/admin-dashboard.php");
        }


    }
    else{
        echo"sql error";
    } 
?>