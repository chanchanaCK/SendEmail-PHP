<?php 
use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php"; 
        $mail = new PHPMailer();
        // 
        // try{
        $mail->SMTPDebug = 0;
        //SMTP Settings
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "apich.ch12@gmail.com";
        $mail->Password = 'likescan';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls
?>