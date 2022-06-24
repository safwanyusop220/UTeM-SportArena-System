<?php
include "../sql/config.php";
// include "../sql/secureStaff.php";

if(isset($_GET["action"])){

    if($_GET["action"] == "approve"){

        
        $id = $_GET["id"];
        //Query
        $sql = "SELECT * FROM staff_request WHERE `id`='$id'";
        $result = mysqli_query( $conn, $sql);
        $resultCheck = mysqli_num_rows ($result);

        if ($resultCheck > 0){
            
            // Get Data
            while ($row = mysqli_fetch_assoc($result)){

                // Get Data
                //Declaration
                $id = $row["id"];
                $staffName = $row["staffName"];
                $staffEmail = $row["staffEmail"];
                $staffId = $row["staffId"];
                $staffNum = $row["staffNum"];
                $staffOffice = $row['staffOffice'];
                $staffPassword = $row['staffPassword'];
                $status = $row["status"];
                $role = $row["role"];

                //Query
                $sql = "INSERT INTO staff (staffName, staffEmail, staffId, staffNum, staffOffice, staffPassword, `status`, `role`)
                 VALUE (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "ssssssss", $staffName, $staffEmail, $staffId, $staffNum, $staffOffice, $staffPassword,$status,$role);


                if (mysqli_stmt_execute ($stmt)){
                echo "<script>alert('Account Has been Approved!');window.location.href='staff-pending-account.php'</script>";
                $sql = "UPDATE staff_request SET `status`='Approved' WHERE id='$id'";
                $result = mysqli_query( $conn, $sql);
                }
                else {
                    echo "<script>alert('Sorry, your databse problem ');window.location.href='staff-pending-account.php'</script>";
                }
            }
        }
    }

}

if(isset($_GET["action"])){

    if($_GET["action"] == "decline"){
        $id = $_GET["id"];

        $sql = "UPDATE staff_request SET `status`='Reject' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Account Has Successfully Rejected!');window.location.href='staff-pending-account.php'</script>";
        }
    }

}


?>

