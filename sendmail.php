<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit']) || isset($_POST['recover'])) {
    session_start();
    $code = rand(1000, 9999);
    $_SESSION['code'] = $code;
    $temp->status = false;
    $mail = new PHPMailer(true);
    $address = $_POST['email'];
    include('dbconnect.php');
    $data = mysqli_query($conn, "SELECT * FROM user WHERE email='$address'");
    if ($data->num_rows == 0 ||isset($_POST['recover'])) {
        $_SESSION['email'] = $address;
        /*
    $message = 'Hello, ' . $name . 'Your verification code is ' . $code . ' Stay connected with us. Thank You.';
    $subject = 'E-mail Verification';
    $mail->isSMTP();
    $mail->SMTPDebug = true;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->Host = 'premium37.web-hosting.com';
    $mail->Username = 'help@zero.ourcuet.com';
    $mail->Password = 'nahidulopu';
    $mail->setFrom('help@zero.ourcuet.com');
    $mail->addAddress($address);
    $mail->Subject = $subject;
    $mail->msgHtml($message);
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $temp->status = true;
        echo "Message has been sent successfully";
    }
    echo json_encode($temp);
    */
        if (isset($_POST['recover'])) {
            echo "<script type='text/javascript'>
    window.location='verification.php?recovery=true';
    </script>";
        }
        echo "<script type='text/javascript'>
    window.location='verification.php';
    </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('This email is already associated with an account');
    window.location='signup.html';
    </script>";
    }
} else {
    echo "<script type='text/javascript'>
          window.location='signup.html';
          </script>";
}
