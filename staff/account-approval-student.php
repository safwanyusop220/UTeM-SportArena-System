<?php
include "../sql/config.php";
// include "../sql/secureStaff.php";

if(isset($_GET["action"])){

    if($_GET["action"] == "approve"){

        
        $id = $_GET["id"];
        //Query
        $sql = "SELECT * FROM student_request WHERE `id`='$id'";
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
                $studFaculty = $row["studFaculty"];
                $studNum = $row['studNum'];
                $studPassword = $row["studPassword"];
                $status = $row["status"];
                $role = $row["role"];

                //Query
                $sql = "INSERT INTO student (studName, studEmail, studMatric, studFaculty, studNum, studPassword, `status`, `role`)
                 VALUE (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "ssssssss", $studName, $studEmail, $studMatric, $studFaculty, $studNum, $studPassword, $status,$role);


                if (mysqli_stmt_execute ($stmt)){
                echo "<script>alert('Account Has been Approved!');window.location.href='student-pending-account.php'</script>";
                $sql = "UPDATE student_request SET `status`='Approved' WHERE id='$id'";
                $result = mysqli_query( $conn, $sql);
                }
                else {
                    echo "<script>alert('Sorry, your databse problem ');window.location.href='student-pending-account.php'</script>";
                }
            }
        }
    }

}

if(isset($_GET["action"])){

    if($_GET["action"] == "decline"){
        $id = $_GET["id"];

        $sql = "UPDATE student_request SET `status`='Reject' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Account Has Successfully Rejected!');window.location.href='student-pending-account.php'</script>";
        }
    }

}


?>

