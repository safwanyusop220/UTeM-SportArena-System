<?php
    include "config.php";
    include "../sql/secure.php";

    if ($userAccess != "student"){
        header("location: ../sql/logout.php");
    }


    //declaration
    $data = array();

    if(isset($_GET['value'])){

        $selection = $_GET['value'];

        //query
        $query = "SELECT * FROM booking WHERE facility_id = $selection AND `status`='Approved'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){

            while($row = mysqli_fetch_assoc($result)){
                $data[] = array(
                    'id' => $row["id"],
                    'title' => $row["studMatric"],
                    'start' => $row["dateTime"],
                    'end' => $row["dateTime"],
                    'className' => "bg-success",
                );
        }
    echo json_encode($data);
    }

    else{
        var_dump("kosonggg");
        exit();
    }
    }

?>