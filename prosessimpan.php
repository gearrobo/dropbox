<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
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

if(isset($_POST['simpan'])){
    $wktu = date('Y-m-d  H:i:s');
    $sender = $_POST['sender'];
    $no_tlp = $_POST['no_tlp'];
    $recipient = $_POST['recipient'];
    $jenis = $_POST['jenis'];
    $email = $_POST['email'];
    $status = 1;
    $token = bin2hex(random_bytes(3));
 
 
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
 
    $sql = "INSERT INTO log_docu (sender, no_tlp, jenis, recipient, room, token, email, created_at) VALUES ('$sender','$no_tlp','$jenis','$recipient','$room','$token','$email','$wktu') ";
 
     if(mysqli_query($conn,$sql)){
         echo '
             <div class="alert alert-success" role="alert">
                 Data Tanaman Berhasil di Tambah!
             </div>
         ';
     }else{
         echo "ERROR, tidak berhasil". mysqli_error($conn);
     }
 
 }

?>