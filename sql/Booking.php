<?php
include "config.php";

if (isset($_POST['btnSubmit'])) {
    $bookingBy   = trim($_POST["bookingBy"]);
    $sportName = $_POST['sportName'];
    $sportVenue = $_POST['sportVenue'];
    $sportDate = $_POST['date'];
    $sportTimeslot = $_POST['timeSlots'];
    $cid = $_POST['facilityId'];
    $userMatricNum = trim($_POST["matricNum"]);
    $sessionStudId = trim($_POST["studId"]);

    // $y = date("y-m-d h:m", strtotime($sportDate,$sportTimeslot));


    //Sql
    $sql = "INSERT INTO booking(bookingBy, sportName, sportVenue, facility_id, `dateTime`, timeSlots, studMatric, studId) VALUE (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    //Bind 
    mysqli_stmt_bind_param($stmt, "ssssssss", $bookingBy,  $sportName, $sportVenue, $cid, $sportDate, $sportTimeslot, $userMatricNum, $sessionStudId);

            //execute
            if (mysqli_stmt_execute ($stmt)){
                echo "<script>alert('Successfully booking facility');window.location.href='../student/student-facility-list.php'</script>";
            }
            else {
                echo "<script>alert('Sorry, your databse problem ');window.location.href='../student/student-facility-list.php'</script>";
            }


}


?>