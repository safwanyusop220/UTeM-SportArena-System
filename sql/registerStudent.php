<?php
$studName = $_POST['studName'];
$studEmail = $_POST['studEmail'];
$studMatric = $_POST['studMatric'];
$studFaculty = $_POST['studFaculty'];
$studNum = $_POST['studNum'];
$studPassword = $_POST['studPassword'];


//Database connection
$conn = new mysqli('localhost', 'root', '', 'utemsportarena_db');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
else {


    $stmt = $conn->prepare('INSERT INTO student_request (studName, studEmail, studMatric, studFaculty, studNum, studPassword)
     VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->bind_param("ssssss", $_POST['studName'], $_POST['studEmail'], $_POST['studMatric'],
     $_POST['studFaculty'], $_POST['studNum'], $_POST['studPassword'] );
    $stmt->execute();

    echo "<script>alert('Successfully registered account, wait for approval from Management');window.location.href='../index.html'</script>";
}


?>