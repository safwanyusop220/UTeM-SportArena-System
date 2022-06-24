<?php
    session_start();

    if (empty($_SESSION['userUniqeAccess'])){
        header("location: ../sql/logout.php");
    }

    else{
        $userLogin = $_SESSION['userUniqeName'];
        $userAccess = $_SESSION['userUniqeAccess'];
    }
?>