<?php
include 'conn.php';

if(isset($_POST['caritoken'])){
   $token = $_POST['token'];
}
$com = "COM3";
$room = 1 ;

$carikamar = query("SELECT * FROM docu WHERE '$token' = 1234 ");
foreach ($carikamar as $kamar) {
   // echo $kamar['room'];
   $room = $kamar['room'];
}

// exec("mode ".$com." BAUD=9600 PARITY=N data=8 stop=1 xon=off");


// $fp = fopen ($com, "w");
// fwrite($fp, "\r");
// fwrite($fp, "buka".$room."\n");
// fclose($fp);
// if (!$fp) {
//    // echo "Not open";
// } else {
//    // echo "Open";
// }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gearroboone@gmail.com';                     //SMTP username
    $mail->Password   = 'jyylgvenvthnvkqt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gearroboone@gmail.com', 'Mailer');
   //  $mail->addAddress('budisantosokavling@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('androexe5@gmail.com', 'Resky');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Dropbox Automation System Test';
    $mail->Body    = 'Dokumen Anda Telah diambil dengan token '.$token.' <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('location:jeda.php');
?>