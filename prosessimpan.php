<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
exec("mode COM4 BAUD=9600 PARITY=N data=8 stop=1 xon=off");



if(isset($_POST['simpan'])){
    $wktu = date('Y-m-d  H:i:s');
    $sender = $_POST['sender'];
    $no_tlp = $_POST['no_tlp'];
    $recipient = $_POST['recipient'];
    $jenis = $_POST['jenis'];
    $email = $_POST['email'];
    $status = 1;
    $chat_id = $_POST['chat_id'];
    $token = bin2hex(random_bytes(3));

    $sum_doc_in = $sum_doc_in + 1;
 
 
    $ceks = query("SELECT * FROM docu WHERE status = '0' limit 1");
    foreach ($ceks as $cekstatus) {
         echo $cekstatus['status'];
         $room = $cekstatus['room'];
    }
 
    $sql = " UPDATE docu SET sender = '".$sender."',
    no_tlp = '".$no_tlp."',
    jenis = '".$jenis."',
    recipient = '".$recipient."',
    token = '".$token."',
    email = '".$email."',
    status = '".$status."',
    chat_id = '".$chat_id."',
    updated_at = '".$wktu."'  WHERE room = '".$room."' ";
    
    exec("mode COM4 BAUD=9600 PARITY=N data=8 stop=1 xon=off");


    $fp = fopen ("com4", "w");
    sleep(2);
    fwrite($fp, "\r");
    fwrite($fp, "buka".$room."\n");
    fclose($fp);
    if (!$fp) {
    // echo "Not open";
    } else {
    // echo "Open";
    }
 
     if(mysqli_query($conn,$sql)){
       echo '
       <div class="alert alert-warning" role="alert">
       Data Berhasil di Ubah!
       </div>
       ';
     }else{
       echo "ERROR, tidak berhasil". mysqli_error($conn);
     }
 
    $sql = "INSERT INTO log_docu (sender, no_tlp, jenis, recipient, room, token, email, chat_id, created_at) VALUES ('$sender','$no_tlp','$jenis','$recipient','$room','$token','$email','$chat_id','$wktu') ";
 
     if(mysqli_query($conn,$sql)){
         echo '
             <div class="alert alert-success" role="alert">
                 Data Tanaman Berhasil di Tambah!
             </div>
         ';
         $apiToken = "5065160162:AAEVWCHA-TEiqZq7eKQagiTy5pa-Op-myVI";
$string = 'Selamat Datang, Dokumen Anda Telah Tersimpan dengan Token '.$token .'Terima Kasih';
$data = [
   'chat_id' => $chat_id,
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

         header('location:jedasimpan.php');
     }else{
         echo "ERROR, tidak berhasil". mysqli_error($conn);
     }
 
 }

?>