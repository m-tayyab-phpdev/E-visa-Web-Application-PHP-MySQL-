<?php
include '../../php/connection.php';
if(isset($_POST['btn-confirm'])){
    $id = $_POST['appid'];
    $change = "reviewed";
    $sql = "UPDATE `applicant_info` SET `review` = '$change' WHERE `app_id` = '$id'";
    $run = mysqli_query($con, $sql);
    if($run){
        $_SESSION['msg'] = "Application submitted successfully";
        $_SESSION['color'] = "success";
        header('location:../viewapplication.php');
    }
}
?>