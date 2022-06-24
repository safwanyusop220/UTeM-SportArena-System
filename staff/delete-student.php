<?php
include "../sql/config.php";

if (isset($_GET['delete'])) {
    
    $id = $_GET["delete"];

    //Querry
    $sql = "SELECT * FROM student where id = '$id'";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows ($result);

    if ($resultCheck > 0){
        
        $row = mysqli_fetch_assoc($result);

        //  Querry Delete
        $sql = "DELETE FROM student where id = '$id'";
        $result = mysqli_query( $conn, $sql);
        echo "<script>alert('Data has been delete !');window.location.href='staff-registered-student.php'</script>";
    }
    else {
        echo "<script>alert('problem has occur with database 1 !');window.location.href='staff-registered-student.php'</script>";
    }

    
}
else {
    echo "<script>alert('Error 404 !');window.location.href='staff-registered-student.php'</script>";
}


?>