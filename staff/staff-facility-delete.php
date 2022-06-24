<?php
include "../sql/config.php";

if (isset($_GET['delete'])) {
    
    $id = $_GET["delete"];

    //Querry
    $sql = "SELECT * FROM facility where id = '$id'";
    $result = mysqli_query( $conn, $sql);
    $resultCheck = mysqli_num_rows ($result);

    if ($resultCheck > 0){
        
        $row = mysqli_fetch_assoc($result);
        $sportImage = $row["sportImage"];

        //  Querry Delete
        $sql = "DELETE FROM facility where id = '$id'";
        $result = mysqli_query( $conn, $sql);
        echo "<script>alert('Data has been delete !');window.location.href='staff-facility-list.php'</script>";
        // Delete Image
        if(file_exists($sportImage)){
            unlink($sportImage);
        }
    }
    else {
        echo "<script>alert('problem has occur with database 1 !');window.location.href='staff-facility-list.php'</script>";
    }

    
}
else {
    echo "<script>alert('Error 404 !');window.location.href='staff-facility-list.php'</script>";
}


?>