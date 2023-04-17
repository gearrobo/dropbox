<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');

if(isset($_POST['caritoken'])){
   $token = $_POST['token'];
}
$com = "COM3";
$room = 1 ;


$carikamar = query("SELECT * FROM docu WHERE token = '$token' ");
foreach ($carikamar as $kamar) {
   echo $kamar['room'];
   $room = $kamar['room'];
}

$sql = " UPDATE docu SET sender = 'a',
   no_tlp = 'a',
   jenis = 'a',
   recipient = 'a',
   token = 'a',
   email = 'a',
   status = '0',
   updated_at = '".$wktu."'  WHERE room = '".$room."' ";
   

    if(mysqli_query($conn,$sql)){
      echo '
      <div class="alert alert-warning" role="alert">
      Data Berhasil di Ubah!
      </div>
      ';
    }else{
      echo "ERROR, tidak berhasil". mysqli_error($conn);
    }

exec("mode COM3 BAUD=9600 PARITY=N data=8 stop=1 xon=off");


$fp = fopen ("com3", "w");
sleep(2);
fwrite($fp, "\r");
fwrite($fp, "buka".$room."\n");
fclose($fp);
if (!$fp) {
   // echo "Not open";
} else {
   // echo "Open";
}


$apiToken = "5065160162:AAEVWCHA-TEiqZq7eKQagiTy5pa-Op-myVI";
$string = 'Dokumen Anda dengan Token '.$token.' telah diambil';
$data = [
   'chat_id' => '1201127925',
   'text' => $string
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                           http_build_query($data) );


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = '@gmail.com';                     //SMTP username
//     $mail->Password   = 'jyylgvenvthnvkqt';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('@gmail.com', 'Mailer');
//    //  $mail->addAddress('budisantosokavling@gmail.com', 'Joe User');     //Add a recipient
//     $mail->addAddress('androexe5@gmail.com', 'Resky');     //Add a recipient
//     //$mail->addAddress('ellen@example.com');               //Name is optional
//     //$mail->addReplyTo('info@example.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

//     //Attachments
//     //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Dropbox Automation System Test';
//     $mail->Body    = 'Dokumen Anda Telah diambil dengan token '.$token.' <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

header('location:jeda.php');
?>