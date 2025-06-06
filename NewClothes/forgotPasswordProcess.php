<?php
require "connection.php";
require  "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_GET["e"])) {
    $email = $_GET["e"];
    $rs = Database::search("SELECT * FROM `users` WHERE `email` ='" . $email . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        $code = uniqid();
        Database::iud("UPDATE `users`SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravishkaindrajith9.9@gmail.com';
        $mail->Password = '**';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ravishkaindrajith9.9@gmail.com', 'Reset Password');
        $mail->addReplyTo('ravishkaindrajith9.9@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'New Clothes Forgot password Verification Code';
        $bodyContent = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Reset Your Password</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    text-align: center;
                    padding: 20px 0;
                    background-color: #4CAF50;
                    color: white;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                }
                .header h1 {
                    margin: 0;
                }
                .content {
                    text-align: center;
                    padding: 20px;
                }
                .content p {
                    font-size: 18px;
                    color: #333333;
                }
                .code {
                    font-size: 24px;
                    font-weight: bold;
                    margin: 20px 0;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border: 1px solid #dddddd;
                    display: inline-block;
                    color: #FF5722;
                }
                .footer {
                    text-align: center;
                    padding: 20px;
                    color: #888888;
                    background-color: #f1f1f1;
                    border-bottom-left-radius: 10px;
                    border-bottom-right-radius: 10px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Reset Your Password</h1>
                </div>
                <div class="content">
                    <p>Hello,' . $email . '</p>
                    <p>We received a request to reset your password. Please use the code below to reset your password:</p>
                    <div class="code">' . $code . '</div>
                  
                </div>
                <div class="footer">
                    <p>&copy; 2024 NewClothes. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ';
        $mail->Body    = $bodyContent;
        if (!$mail->send()) {
            echo "verification code sending failed";
        } else {
            echo "success";
        }
    } else {
        echo ("invalid email address");
    }
}
?>