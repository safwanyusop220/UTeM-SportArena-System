<?php
include "../sql/config.php";
include "../sql/secureStaff.php";

if(isset($_GET["action"])){

    if($_GET["action"] == "approve"){
        $id = $_GET["id"];

        $sql = "UPDATE booking SET `status`='Approved' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('The Booking Has Successfully Approved!');window.location.href='booking-list-pending.php'</script>";
        }
    }

}

if(isset($_GET["action"])){

    if($_GET["action"] == "decline"){
        $id = $_GET["id"];

        $sql = "UPDATE booking SET `status`='Reject' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('The Booking Has Successfully Rejected!');window.location.href='booking-list-pending.php'</script>";
        }
    }

}

?>