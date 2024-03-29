<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'PHPMailer/PHPMailerAutoload.php';

class SendMail
{

    public $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->SMTPDebug = 2; 
//        $this->mail->isMail();
        $this->mail->isSMTP();// Set mailer to use SMTP
        $this->mail->Mailer = 'smtp';
        $this->mail->Host = 'smtp.gmail.com';  // ssl://smtp.gmail.com'// Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'arie.rachmad.s@polinema.ac.id';                 // SMTP username
        $this->mail->Password = 'bismiLLah07';                           // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                    // TCP port to connect to
    }

    public function sendTo($toEmail, $recipientName, $subject, $msg)
    {
        $this->mail->setFrom( $this->mail->Username, 'Admin UMKM');
        $this->mail->addAddress($toEmail, $recipientName);
        //$this->mail->isHTML(true); 
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;
        if (!$this->mail->send()) {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
        return true;
    }

}
