<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "ali-visa";
$con = mysqli_connect($server, $user, $password, $db);
if (!($con)) {
    die($con);
    mysqli_error($con);
}
