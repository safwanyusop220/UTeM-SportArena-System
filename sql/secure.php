<?php
    session_start();

    if (empty($_SESSION['userUniqeName'])){
        header("location: ../sql/logout.php");
    }

    else{
        $userLogin = $_SESSION['userUniqeName'];
        $userAccess = $_SESSION['userUniqeAccess'];
        $userMatricNum = $_SESSION['userMatricNum'];
        $sessionStudId = $_SESSION['studentId'];

        // $sessionAdmin = $_SESSION['email'];
    }
?>