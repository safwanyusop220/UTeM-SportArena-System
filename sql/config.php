<?php
//Database connection
$conn = mysqli_connect('localhost', 'root', '', 'utemsportarena_db');

if ($conn == false)
{
    var_dump("database not connected");
    exit();
}
?>