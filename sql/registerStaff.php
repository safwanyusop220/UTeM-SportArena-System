<?php


$staffName = $_POST['staffName'];
$staffEmail = $_POST['staffEmail'];
$staffId = $_POST['staffId'];
$staffNum = $_POST['staffNum'];
$staffPassword = $_POST['staffPassword'];


//Database connection
$conn = new mysqli('localhost', 'root', '', 'utemsportarena_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
else {
    // $stmt = $conn->prepare('insert into auth(fullName, role, email, password )
    //         VALUE(?,?,?)');

    $stmt = $conn->prepare('INSERT INTO staff_request (staffName, staffEmail, staffId, staffNum, staffPassword)
     VALUES(?, ?, ?, ?, ?)');
    $stmt->bind_param("sssss", $_POST['staffName'], $_POST['staffEmail'], $_POST['staffId'],
      $_POST['staffNum'], $_POST['staffPassword'] );
    $stmt->execute();
    echo "<script>alert('Successfully registered account, wait for approval from admin');window.location.href='../index.html'</script>";
    // header("location: ../index.html");


// if(!req){
//     echo "Prepare failed:" (". $conn->errno") ".$conn->error."<br>";
// }




}


?>