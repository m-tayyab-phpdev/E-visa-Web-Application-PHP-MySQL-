<?php
session_start();
include_once 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btn-register'])) {


    function EMAIL($var_email, $var_name)
    {
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aliraza15105@gmail.com';
        $mail->Password   = 'fiyr oqau huub gxeh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        $mail->setFrom('aliraza15105@gmail.com', 'E-Visa');
        $mail->addAddress($var_email, $var_name);


        $mail->isHTML(true);
        $mail->Subject = 'E-Visa Account Varification';
        $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #0078D7;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body h2 {
            color: #0078D7;
        }
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f9;
            font-size: 12px;
            color: #888888;
        }
        .verify-button {
            display: inline-block;
            background-color: black;
            color: #ffffff; 
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
        }
        .verify-button:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>E-Visa Account Verification</h1>
        </div>
        <div class="email-body">
            <h2>Hello ' . htmlspecialchars($var_name) . ',</h2>
            <p>Thank you for registering with our E-Visa platform. To complete your registration, please verify your email address by clicking the button below:</p>
            <p style="text-align: center;">
                <a href="http://localhost/ali-visa/verify.php?email=' . urlencode($var_email) . '" class="verify-button" style="color: white;">Verify My Account</a>
            </p>
            <p>If you did not register for an account, you can safely ignore this email.</p>
        </div>
        <div class="email-footer">
            &copy; ' . date("Y") . ' E-Visa Processing System. All rights reserved.
        </div>
    </div>
</body>
</html>';



        $mail->send();
        return true;
    }



    $var_name = mysqli_real_escape_string($con, $_POST['name']);
    $var_email = mysqli_real_escape_string($con, $_POST['email']);
    $var_password = mysqli_real_escape_string($con, $_POST['password']);
    $var_cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $type = "Applicant";
    $var_type = mysqli_real_escape_string($con, $type);
    $check = "SELECT * FROM `users` WHERE `user_email` = '$var_email'";
    $run_check = mysqli_query($con, $check);
    $num_rows = mysqli_num_rows($run_check);
    if ($num_rows > "0") {
        $_SESSION['msg'] = "Email already registered";
        $_SESSION['color'] = "info";
        header('location:../register.php');
    } else {
        if ($var_password == $var_cpassword) {
            $hash = password_hash($var_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`, `user_type`) VALUES ('$var_name','$var_email','$hash', '$var_type')";
            $run_sql = mysqli_query($con, $sql);
            if ($run_sql) {
                if (EMAIL($var_email, $var_name)) {
                    $_SESSION['msg'] = "Check your email";
                    $_SESSION['color'] = "success";
                    header('location:../register.php');
                } else {
                    $_SESSION['msg'] = "Error while sending email";
                    $_SESSION['color'] = "danger";
                    header('location:../register.php');
                }
            }
        } else {
            $_SESSION['msg'] = "Passwords not match";
            $_SESSION['color'] = "danger";
            header('location:../register.php');
        }
    }
}
