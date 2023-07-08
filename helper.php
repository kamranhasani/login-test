<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'RUN.php';

function test_input($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  
function email($search,$token){
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);               
              
    try {

      
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kamranhasaniinfo@gmail.com';                     //SMTP username
        $mail->Password   = 'tfytxmcwgsbidqkk';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;      


        // TCP port to connect to
        $mail->CharSet = 'utf-8';
        $mail->FromName = 'از طرف مدیر سایت';
        $mail->ContentType = 'text/html;charset=utf-8';

        //Content
        $mail->isHTML(true);
        $mail->setFrom('kamranhasaniinfo@gmail.com', 'Mailer');
        $mail->addAddress ($search,'cue');     //Add a recipient
        $mail->Subject = 'فعال سازی حساب کاربری';
        $mail->Body = '<p align="right"><a href="http://localhost/login/RUN.php?do='.$token.'">برای فعال سازی حساب کلیک نمایید!</a></p>';
     

        $mail->send();
        if ($mail){
          return $mail;
        }
    } catch (Exception $e) {
        echo 'خطا در ارسال ایمیل مجددا تلاش نمایید و یا با مدیرت تماس حاصل فرمایید...', $mail->ErrorInfo;
    }
 $mail->SmtpClose();
return;

  }


function chektoken($value){
  if(isset($_SESSION['token']) && $_SESSION['token']==$value)
   unset($_SESSION['token']);
    return true;

}



?>