<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailService
{

    public function Send($emailAddress, $message, $subject)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //includes the email and password for the email server
            // require __DIR__ . '/../config/phpmailerconfig.php';

            // $password = "pwDii&meVZ2&bXWUJ4s0";
            $password = "yulluukxntwpynyd";
            $email = "hfestivalphp@gmail.com";
            // Instantiate a new PHPMailer object
            $mail = new PHPMailer;
            // Set the mailer to use SMTP
            $mail->isSMTP();

            // Specify the SMTP server details
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = false;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the sender and recipient email addresses
            $mail->setFrom($email, 'VisitHaarlem');
            $mail->addAddress($emailAddress, '');

            // Set the subject and message body
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Check if the email was sent successfully
            if (!$mail->send()) {
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo '<div class="alert alert-success" role="alert">Email has been sent.</div>';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function sendWithAttachment($message, $emailAddress, $attachments, $subject, $orderId)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //includes the email and password for the email server
            // require __DIR__ . '/../config/phpmailerconfig.php';
            $password = "yulluukxntwpynyd";
            $email = "hfestivalphp@gmail.com";
            // Instantiate a new PHPMailer object
            $mail = new PHPMailer;
            // Set the mailer to use SMTP
            $mail->isSMTP();

            // Specify the SMTP server details
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the sender and recipient email addresses
            $mail->setFrom($email, 'VisitHaarlem');
            $mail->addAddress($emailAddress, '');

            $counter = 1;
            foreach ($attachments as $pdf) {
                $mail->addStringAttachment($pdf, 'ticket' . $counter . '.pdf', 'base64', 'application/pdf');
                $counter++;
            }

            // Set the subject and message body
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Check if the email was sent successfully
            if (!$mail->send()) {
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo '<div class="alert alert-success" role="alert">Email has been sent.</div>';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
