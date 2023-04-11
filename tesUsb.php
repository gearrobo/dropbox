<?php
include 'conn.php';

if(isset($_POST['caritoken'])){
   $token = $_POST['token'];
}
$com = "COM3";
$room = 1 ;

$carikamar = query("SELECT * FROM dokumen WHERE '$token' = 1234 ");
foreach ($carikamar as $kamar) {
   // echo $kamar['room'];
   $room = $kamar['room'];
}

exec("mode ".$com." BAUD=9600 PARITY=N data=8 stop=1 xon=off");


$fp = fopen ($com, "w");
fwrite($fp, "\r");
fwrite($fp, "buka".$room."\n");
fclose($fp);
if (!$fp) {
   // echo "Not open";
} else {
   // echo "Open";
}

header('location:index.php');
?>